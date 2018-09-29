	$(document).ready(function() {
			    // Modal 1
			    $('#popup-1').slickModals({
			        // Hide on pages
			        hideOnPages: [
			            '/foo/page1/',
			            '/foo/page2/',
			            '/foo/page3/'
			        ],
			        // Popup type
			        popupType: 'delayed',
			        delayTime: 1000,
			        scrollTopDistance: 400,
                    // Auto closing
                    autoClose: false,
                    autoCloseDelay: 3000,
                    // Statistics
                    enableStats: false,
                    fileLocation: 'slickStats/collect.php',
                    modalName: 'My awesome modal 1',
                    modalSummary: 'Lorem ipsum dolor sit amet',
                    callToAction: 'cta',
			        // Popup cookies
			        setCookie: true,
			        cookieDays: 30,
			        cookieTriggerClass: 'setCookie-1',
			        cookieName: 'slickModal-1',
			        cookieScope: 'domain',
			        // Overlay styling
			        overlayVisible: true,
			        overlayClosesModal: true,
			        overlayColor: 'rgba(0,0,0,0.85)',
			        overlayAnimationDuration: '0.4',
                    overlayAnimationEffect: 'fadeIn',
			        // Background effects
			        pageAnimationDuration: '0.4',
                    pageAnimationEffect: 'scale',
                    pageBlurRadius: '1px',
                    pageScaleValue: '1',
                    pageMoveDistance: '30%',
			        // Popup styling
			        popupWidth: '560px',
			        popupHeight: '300px',
			        popupLocation: 'center',
			        popupAnimationDuration: '0.6',
			        popupAnimationEffect: 'rotateIn',
			        popupBoxShadow: '0 0 20px 0 rgba(0,0,0,0.4)',
			        popupBackground: "rgba(255,255,255,1)",
			        popupRadius: '0',
			        popupMargin: '0',
			        popupPadding: '0',
			        // Mobile rules
                    showOnMobile: true,
			        responsive: true,
			        mobileBreakPoint: '560px',
			        mobileLocation: 'bottomCenter',
			        mobileWidth: '100%',
			        mobileHeight: 'auto',
			        mobileRadius: '0',
			        mobileMargin: '0',
			        mobilePadding: '0',
			        // Animate content
			        contentAnimation: false,
			        contentAnimationEffect: 'zoomIn',
			        contentAnimationDuration: '0.4',
			        contentAnimationDelay: '0.4',
			        // Youtube videos
			        videoSupport: false,
			        videoAutoPlay: true,
			        videoStopOnClose: true,
			        // Close and reopen button
			        addCloseButton: true,
			        buttonStyle: 'icon',
			        enableESC: true,
			        reopenClass: 'openSlickModal-1',
			        // Additional events
			        onSlickLoad: function() {
			            // Your code goes here
			        },
			        onSlickClose: function() {
			            // Your code goes here
			        }
			    });
			});