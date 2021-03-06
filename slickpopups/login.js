                function login() {
                // Form validation
                function sendFormData() {
                    var name_pattern   = /^[a-zA-Z\s]+$/;
                    var email_pattern  = /(.+)@(.+){2,}\.(.+){2,}/;
                    var number_pattern = /^-?\d+\.?\d*$/;
                    var $name_input    = $('#slickForm-1 .name');
                    var $email_input   = $('#slickForm-1 .email');
                    var $phone_input   = $('#slickForm-1 .phone');
                    var $message_input = $('#slickForm-1 .message');
                    var errorMsg       = $('#errorMsg');
                    $('#slickForm-1').on('submit', function(e) {
                        e.preventDefault();
                        if (!name_pattern.test($name_input.val())) {
                            errorMsg.text('Please tell us your name');
                        } else if (!email_pattern.test($email_input.val())) {
                            errorMsg.text('Please use valid email address');
                        } else if (!number_pattern.test($phone_input.val())) {
                            errorMsg.text('A valid phone number is required');
                        } else if (!$message_input.val()) {
                            errorMsg.text('Message is required');
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: 'yourScript.php', // Insert the path which points towards your mail script
                                data: $(this).serialize(),
                                success: function(data) {
                                    errorMsg.text('');
                                    $('#popup-2 .title').text('Thank you for your submittion');
                                    $('#popup-2 p').text('We will be with you soon.');
                                    $('#popup-2 .bottomClose').text('Close the form window').css('margin-top', '20px');
                                    $('#slickForm-1').slideUp();
                                    setTimeout(function(){
                                        $('#popup-2 .closeModal.bottomClose').click();
                                    }, 4000); // Autoclose the form after 4000 when submitted
                                },
                                error: function() {
                                    errorMsg.text('Something went wrong. Please try again.');
                                }
                            });
                        }
                    })
                };
			    // Modal 1
			    $('#popup-2').slickModals({
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
                    pageAnimationEffect: 'none',
                    pageBlurRadius: '1px',
                    pageScaleValue: '0.9',
                    pageMoveDistance: '30%',
			        // Popup styling
			        popupWidth: '420px',
			        popupHeight: '500px',
			        popupLocation: 'center',
			        popupAnimationDuration: '0.8',
			        popupAnimationEffect: 'flipInY',
			        popupBoxShadow: 'none',
			        popupBackground: 'transparent',
			        popupRadius: '0',
			        popupMargin: 'auto',
			        popupPadding: '0',
			        // Mobile rules
                    showOnMobile: true,
			        responsive: true,
			        mobileBreakPoint: '480px',
			        mobileLocation: 'center',
			        mobileWidth: '96%',
			        mobileHeight: '500px',
			        mobileRadius: '0',
			        mobileMargin: '0',
			        mobilePadding: '24px',
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
			        buttonStyle: '',
			        enableESC: true,
			        reopenClass: 'openSlickModal-2',
			        // Additional events
			        onSlickLoad: function() {
			            sendFormData();
			        },
			        onSlickClose: function() {
			            // Your code goes here
			        }
			    });
			});