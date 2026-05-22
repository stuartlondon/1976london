// Debug logging function
function debugLog(message) {
  console.log('[1976 London]:', message);
}

debugLog('Scripts.js loaded successfully');

// Keep universal menu helpers globally available for inline template handlers.
window.openUniversalMenu = function () {
  const modal = document.getElementById('universalMenuModal');
  if (modal) {
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }
};

window.closeUniversalMenu = function () {
  const modal = document.getElementById('universalMenuModal');
  if (modal) {
    modal.style.display = 'none';
    document.body.style.overflow = '';
  }
};

document.addEventListener('DOMContentLoaded', function () {
  debugLog('DOM Content Loaded');

  // Safety reset for live cache/overlay edge-cases.
  function resetStaleOverlayState() {
    const overlaySelectors = [
      '#homeMenuModal',
      '#universalMenuModal',
      '#dashboardModal',
      '#sitePreviewModal',
    ];

    overlaySelectors.forEach((selector) => {
      const element = document.querySelector(selector);
      if (element && window.getComputedStyle(element).display !== 'none') {
        element.style.display = 'none';
      }
    });

    const lightbox = document.getElementById('lightbox');
    if (lightbox && !lightbox.classList.contains('active')) {
      lightbox.style.display = 'none';
    }

    document.body.style.overflow = '';
    document.documentElement.style.overflowY = 'auto';
  }

  resetStaleOverlayState();

  // Defensive fallback: if a non-scrollable layer captures wheel events,
  // force page scroll when no modal is active.
  document.addEventListener(
    'wheel',
    function (event) {
      const universalMenu = document.getElementById('universalMenuModal');
      const dashboardModal = document.getElementById('dashboardModal');
      const sitePreviewModal = document.getElementById('sitePreviewModal');
      const lightbox = document.getElementById('lightbox');

      const modalOpen =
        (universalMenu && window.getComputedStyle(universalMenu).display !== 'none') ||
        (dashboardModal && window.getComputedStyle(dashboardModal).display !== 'none') ||
        (sitePreviewModal && window.getComputedStyle(sitePreviewModal).display !== 'none') ||
        (lightbox && lightbox.classList.contains('active'));

      if (modalOpen) {
        return;
      }

      const beforeScroll = window.scrollY;
      const deltaY = event.deltaY;

      if (!deltaY) {
        return;
      }

      requestAnimationFrame(function () {
        if (window.scrollY === beforeScroll) {
          window.scrollBy(0, deltaY);
        }
      });
    },
    { passive: true }
  );

  // ========================================
  // HOME-STYLE HAMBURGER MENU FOR ALL PAGES
  // ========================================

  function initHomeStyleMenu() {
    debugLog('Initializing home-style menu for all pages');

    // Check what page we're on
    const isHomePage =
      document.body.classList.contains('home') || document.body.classList.contains('front-page');
    debugLog('Is home page:', isHomePage);

    // For home page - existing functionality
    const homeHamburger = document.querySelector('.home-hamburger');
    const homeModal = document.getElementById('homeMenuModal');

    if (homeHamburger && homeModal) {
      debugLog('Home page hamburger found');

      homeHamburger.addEventListener('click', function (e) {
        debugLog('Home hamburger clicked');
        e.preventDefault();
        e.stopPropagation();
        homeModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        debugLog('Home menu modal opened');
      });

      // Close when clicking outside
      homeModal.addEventListener('click', function (e) {
        if (e.target === homeModal) {
          closeHomeMenu();
        }
      });

      // Close button
      const homeCloseBtn = homeModal.querySelector('.menu-close-btn');
      if (homeCloseBtn) {
        homeCloseBtn.addEventListener('click', function (e) {
          e.preventDefault();
          closeHomeMenu();
        });
      }
    } else {
      debugLog(
        'Home page elements not found - homeHamburger:',
        !!homeHamburger,
        'homeModal:',
        !!homeModal
      );
    }

    // For other pages - enhance universal hamburger to match home style
    const universalHamburger = document.querySelector('.universal-hamburger');
    const universalModal = document.querySelector('.universal-menu-modal');

    debugLog('Looking for universal elements...');
    debugLog('universalHamburger found:', !!universalHamburger);
    debugLog('universalModal found:', !!universalModal);

    if (universalHamburger && universalModal) {
      debugLog('Universal hamburger found - applying home-style functionality');

      // Make sure the button is visible
      universalHamburger.style.display = 'flex';
      universalHamburger.style.visibility = 'visible';
      debugLog('Universal hamburger visibility forced');

      universalHamburger.addEventListener('click', function (e) {
        debugLog('Universal hamburger clicked');
        e.preventDefault();
        e.stopPropagation();
        universalModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        debugLog('Universal menu modal opened');
      });

      // Close when clicking outside
      universalModal.addEventListener('click', function (e) {
        if (e.target === universalModal) {
          debugLog('Clicked outside universal modal content');
          closeUniversalMenu();
        }
      });

      // Close button
      const universalCloseBtn = universalModal.querySelector('.universal-close-button');
      if (universalCloseBtn) {
        debugLog('Universal close button found');
        universalCloseBtn.addEventListener('click', function (e) {
          debugLog('Universal close button clicked');
          e.preventDefault();
          closeUniversalMenu();
        });
      } else {
        debugLog('Universal close button NOT found');
      }
    } else {
      debugLog('Universal elements not found - this might be the issue!');
      if (!universalHamburger) debugLog('Missing: .universal-hamburger element');
      if (!universalModal) debugLog('Missing: .universal-menu-modal element');
    }

    // ESC key functionality for all menus
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        if (homeModal && homeModal.style.display === 'flex') {
          closeHomeMenu();
        }
        if (universalModal && universalModal.style.display === 'flex') {
          closeUniversalMenu();
        }
      }
    });

    function closeHomeMenu() {
      if (homeModal) {
        homeModal.style.display = 'none';
        document.body.style.overflow = '';
        debugLog('Home menu modal closed');
      }
    }

    function closeUniversalMenu() {
      if (universalModal) {
        universalModal.style.display = 'none';
        document.body.style.overflow = '';
        debugLog('Universal menu modal closed');
      }
    }

    // Make functions globally available
    window.closeHomeMenu = closeHomeMenu;
    window.closeUniversalMenu = closeUniversalMenu;

    debugLog('Home-style menu initialized successfully');
  }

  // ========================================
  // HAMBURGER MENU FUNCTIONALITY (Legacy)
  // ========================================

  function initHamburgerMenu() {
    debugLog('Initializing hamburger menu');

    const hamburger = document.querySelector('.hamburger');
    const sidePanel = document.querySelector('.side-panel');

    if (!hamburger || !sidePanel) {
      debugLog('Hamburger or side panel not found');
      return;
    }

    debugLog('Hamburger menu elements found');

    // Toggle side panel when hamburger is clicked
    hamburger.addEventListener('click', function (e) {
      debugLog('Hamburger clicked');
      e.preventDefault();
      e.stopPropagation();
      sidePanel.classList.toggle('open');
      debugLog('Side panel toggled, open:', sidePanel.classList.contains('open'));
    });

    // Prevent closing when clicking inside the side panel
    sidePanel.addEventListener('click', function (e) {
      e.stopPropagation();
    });

    // Close side panel when clicking outside of it
    document.addEventListener('click', function (e) {
      if (sidePanel.classList.contains('open')) {
        // Check if click is outside both the panel and hamburger
        if (!sidePanel.contains(e.target) && !hamburger.contains(e.target)) {
          debugLog('Clicking outside side panel, closing');
          sidePanel.classList.remove('open');
        }
      }
    });

    // Close side panel when pressing Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && sidePanel.classList.contains('open')) {
        debugLog('Escape key pressed, closing side panel');
        sidePanel.classList.remove('open');
      }
    });

    debugLog('Hamburger menu initialized successfully');
  }

  // ========================================
  // LIGHTBOX GALLERY FUNCTIONALITY
  // ========================================

  function initLightbox() {
    debugLog('Initializing lightbox');

    let currentImageIndex = 0;
    let galleryImages = [];

    // Create lightbox HTML structure
    function createLightbox() {
      debugLog('Creating lightbox HTML');
      const lightboxHTML = `
                <div class="lightbox-overlay" id="lightbox">
                    <div class="lightbox-content">
                        <button class="lightbox-close" aria-label="Close gallery"></button>
                        <button class="lightbox-nav lightbox-prev" aria-label="Previous image"></button>
                        <button class="lightbox-nav lightbox-next" aria-label="Next image"></button>
                        <img class="lightbox-image" src="" alt="" id="lightbox-img">
                        <div class="lightbox-info">
                            <h3 class="lightbox-title" id="lightbox-title"></h3>
                            <p class="lightbox-caption" id="lightbox-caption"></p>
                            <p class="lightbox-alt" id="lightbox-alt"></p>
                            <p class="lightbox-subtitle" id="lightbox-subtitle"></p>
                            <p class="lightbox-description" id="lightbox-description"></p>
                        </div>
                        <div class="lightbox-counter" id="lightbox-counter"></div>
                    </div>
                </div>
            `;
      document.body.insertAdjacentHTML('beforeend', lightboxHTML);
      debugLog('Lightbox HTML created');
    }

    // Initialize lightbox
    createLightbox();

    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxAlt = document.getElementById('lightbox-alt');
    const lightboxSubtitle = document.getElementById('lightbox-subtitle');
    const lightboxDescription = document.getElementById('lightbox-description');
    const lightboxCounter = document.getElementById('lightbox-counter');
    const closeBtn = document.querySelector('.lightbox-close');
    const prevBtn = document.querySelector('.lightbox-prev');
    const nextBtn = document.querySelector('.lightbox-next');

    if (!lightbox) {
      debugLog('Lightbox creation failed');
      return;
    }

    // Find all gallery images and lightbox triggers
    const imageSelectors = [
      '.gallery-item img',
      '.grid-item img',
      '.painting-item img',
      '.commission-item img',
      '.small-work-item img',
      '.update-image img',
      '.featured-image img',
      '.lightbox-trigger img', // Add this for paintings page
    ];
    const allImages = document.querySelectorAll(imageSelectors.join(', '));
    debugLog('Found ' + allImages.length + ' images for lightbox');

    // Convert to array with metadata
    galleryImages = Array.from(allImages).map((img, index) => {
      // For paintings page, get info from data attributes on parent link
      const link = img.closest('.lightbox-trigger');
      let title = '';
      let subtitle = '';
      let description = '';
      let caption = '';
      let alt = img.alt || '';
      if (link) {
        title = link.getAttribute('data-title') || '';
        caption = link.getAttribute('data-caption') || '';
        subtitle = '';
        const medium = link.getAttribute('data-medium') || '';
        const size = link.getAttribute('data-size') || '';
        if (medium || size) {
          subtitle = [medium, size].filter(Boolean).join(', ');
        }
        description = link.getAttribute('data-description') || '';
        alt = link.getAttribute('data-alt') || alt;
      } else {
        // Fallback for other galleries
        const parent = img.closest(
          '.gallery-item, .grid-item, .painting-item, .commission-item, .small-work-item, .update-card, .featured-update'
        );
        if (parent) {
          const titleEl = parent.querySelector(
            'h3, h4, .painting-details h3, .commission-details h3, .small-work-details h3, .update-content h4, .featured-text h2'
          );
          if (titleEl) title = titleEl.textContent.trim();
          const subtitleEl = parent.querySelector(
            '.painting-details p:first-of-type, .commission-details p:first-of-type'
          );
          if (subtitleEl) subtitle = subtitleEl.textContent.trim();
          const descEl = parent.querySelector(
            '.painting-details p:last-of-type, .commission-details p:not(:first-of-type), .small-work-details p, .update-excerpt, .featured-excerpt'
          );
          if (descEl) description = descEl.textContent.trim();
        }
      }
      return {
        src: img.src,
        alt: alt || title || 'Artwork ' + (index + 1),
        title: title || alt || 'Untitled',
        caption: caption,
        subtitle: subtitle,
        description: description,
      };
    });

    debugLog('Gallery images prepared:', galleryImages.length);

    // Add click handlers to images
    allImages.forEach((img, index) => {
      img.style.cursor = 'pointer'; // Make it clear images are clickable
      img.addEventListener('click', function (e) {
        e.preventDefault();
        debugLog('Image clicked, opening lightbox at index:', index);
        openLightbox(index);
      });
    });

    // Open lightbox
    function openLightbox(index) {
      debugLog('Opening lightbox at index:', index);
      currentImageIndex = index;
      updateLightboxContent();
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden'; // Prevent background scrolling

      // Update navigation visibility
      if (galleryImages.length <= 1) {
        lightbox.classList.add('single-image');
      } else {
        lightbox.classList.remove('single-image');
      }
    }

    // Close lightbox
    function closeLightbox() {
      debugLog('Closing lightbox');
      lightbox.classList.remove('active');
      document.body.style.overflow = ''; // Restore scrolling
    }

    // Update lightbox content
    function updateLightboxContent() {
      const image = galleryImages[currentImageIndex];
      if (!image) {
        debugLog('No image found at index:', currentImageIndex);
        return;
      }
      debugLog('Updating lightbox content:', image.title);
      lightboxImg.src = image.src;
      lightboxImg.alt = image.alt;
      lightboxTitle.textContent = image.title;
      lightboxCaption.textContent = image.caption;
      lightboxAlt.textContent = image.alt;
      lightboxSubtitle.textContent = image.subtitle;
      lightboxDescription.textContent = image.description;
      // Update counter
      if (galleryImages.length > 1) {
        lightboxCounter.textContent = `${currentImageIndex + 1} / ${galleryImages.length}`;
        lightboxCounter.style.display = 'block';
      } else {
        lightboxCounter.style.display = 'none';
      }
      // Hide caption, alt, and subtitle if empty
      lightboxCaption.style.display = image.caption ? 'block' : 'none';
      lightboxAlt.style.display = image.alt ? 'block' : 'none';
      lightboxSubtitle.style.display = image.subtitle ? 'block' : 'none';
    }

    // Navigation functions
    function showNext() {
      currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
      updateLightboxContent();
    }

    function showPrev() {
      currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
      updateLightboxContent();
    }

    // Event listeners
    if (closeBtn) {
      closeBtn.addEventListener('click', function (e) {
        e.preventDefault();
        closeLightbox();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function (e) {
        e.preventDefault();
        showNext();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function (e) {
        e.preventDefault();
        showPrev();
      });
    }

    // Close on overlay click
    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox) {
        closeLightbox();
      }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function (e) {
      if (!lightbox.classList.contains('active')) return;

      switch (e.key) {
        case 'Escape':
          closeLightbox();
          break;
        case 'ArrowLeft':
          if (galleryImages.length > 1) showPrev();
          break;
        case 'ArrowRight':
          if (galleryImages.length > 1) showNext();
          break;
      }
    });

    debugLog('Lightbox initialized successfully');
  }

  // Initialize all functionality with enhanced debugging
  debugLog('Starting initialization of all functions...');

  try {
    initHomeStyleMenu();
    debugLog('✅ initHomeStyleMenu completed');
  } catch (error) {
    debugLog('❌ initHomeStyleMenu failed:', error);
  }

  try {
    initHamburgerMenu();
    debugLog('✅ initHamburgerMenu completed');
  } catch (error) {
    debugLog('❌ initHamburgerMenu failed:', error);
  }

  // Skip old lightbox on gallery page (uses its own 96% lightbox system)
  if (!document.body.classList.contains('page-template-page-gallery')) {
    try {
      initLightbox();
      debugLog('✅ initLightbox completed');
    } catch (error) {
      debugLog('❌ initLightbox failed:', error);
    }
  } else {
    debugLog('📷 Gallery page detected - using 96% viewport lightbox system');
  }

  // Additional check for universal hamburger after a delay
  setTimeout(function () {
    const hamburgerCheck = document.querySelector('.universal-hamburger');
    const modalCheck = document.querySelector('.universal-menu-modal');
    debugLog('Post-init check - Hamburger exists:', !!hamburgerCheck);
    debugLog('Post-init check - Modal exists:', !!modalCheck);

    if (hamburgerCheck) {
      debugLog('Hamburger computed style:', window.getComputedStyle(hamburgerCheck).display);
      debugLog('Hamburger visibility:', window.getComputedStyle(hamburgerCheck).visibility);
    }
  }, 1000);

  window.addEventListener('pageshow', resetStaleOverlayState);

  debugLog('All scripts initialized');
});
