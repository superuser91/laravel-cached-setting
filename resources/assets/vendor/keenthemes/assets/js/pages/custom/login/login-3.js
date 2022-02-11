'use strict';

// Class Definition
var KTLogin = function () {
    var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

    var _handleFormSignin = function () {
        var form = KTUtil.getById('kt_login_singin_form');
        var formSubmitUrl = KTUtil.attr(form, 'action');
        var formSubmitButton = KTUtil.getById('kt_login_singin_form_submit_button');

        if (!form) {
            return;
        }

        FormValidation.formValidation(form,
            {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Thư điện tử không được trống'
                            },
                            emailAddress: {
                                message: 'Thư điện tử không hợp lệ'
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Mật khẩu không được trống'
                            },
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                        //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
                    })
                }
            }
        ).on('core.form.valid', function () {
            // Show loading state on button
            KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Đang xử lý');

            // Simulate Ajax request
            // setTimeout(function () {
            //     KTUtil.btnRelease(formSubmitButton);
            // }, 2000);

            // Form Validation & Ajax Submission: https://formvalidation.io/guide/examples/using-ajax-to-submit-the-form
            /**
             FormValidation.utils.fetch(formSubmitUrl, {
		            method: 'POST',
					dataType: 'json',
		            params: {
		                name: form.querySelector('[name='username']').value,
		                email: form.querySelector('[name='password']').value,
		            },
		        }).then(function(response) { // Return valid JSON
					// Release button
					KTUtil.btnRelease(formSubmitButton);

					if (response && typeof response === 'object' && response.status && response.status == 'success') {
						Swal.fire({
			                text: 'All is cool! Now you submit this form',
			                icon: 'success',
			                buttonsStyling: false,
							confirmButtonText: 'Ok, got it!',
							customClass: {
								confirmButton: 'btn font-weight-bold btn-light-primary'
							}
			            }).then(function() {
							KTUtil.scrollTop();
						});
					} else {
						Swal.fire({
			                text: 'Sorry, something went wrong, please try again.',
			                icon: 'error',
			                buttonsStyling: false,
							confirmButtonText: 'Ok, got it!',
							customClass: {
								confirmButton: 'btn font-weight-bold btn-light-primary'
							}
			            }).then(function() {
							KTUtil.scrollTop();
						});
					}
		        });
             **/
        }).on('core.form.invalid', function () {
            Swal.fire({
                text: 'Xin lỗi, hệ thống xác nhận có lỗi, vui lòng thử lại.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok, tôi hiểu!',
                customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary'
                }
            }).then(function () {
                KTUtil.scrollTop();
            });
        });
    }

    var _handleFormForgot = function () {
        var form = KTUtil.getById('kt_login_forgot_form');
        var formSubmitUrl = KTUtil.attr(form, 'action');
        var formSubmitButton = KTUtil.getById('kt_login_forgot_form_submit_button');

        if (!form) {
            return;
        }

        FormValidation.formValidation(form,
            {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Thư điện tử không được trống'
                            },
                            emailAddress: {
                                message: 'Thư điện tử không hợp lệ'
                            },
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                        //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation iconskt_login_singin_form_submit_button
                    })
                }
            }
        ).on('core.form.valid', function () {
            // Show loading state on button
            KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Đang xử lý');
        }).on('core.form.invalid', function () {
            Swal.fire({
                text: 'Xin lỗi, hệ thống xác nhận có lỗi, vui lòng thử lại.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok, tôi hiểu!',
                customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary'
                }
            }).then(function () {
                KTUtil.scrollTop();
            });
        });
    }

    var _handleFormSignup = function () {
        // Base elements
        var form = KTUtil.getById('kt_login_signup_form');
        var formSubmitUrl = KTUtil.attr(form, 'action');
        var formSubmitButton = KTUtil.getById('kt_login_signup_form_submit_button');

        if (!form) {
            return;
        }

        FormValidation.formValidation(form,
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Tên không được trống'
                            },
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Thư điện tử không được trống'
                            },
                            emailAddress: {
                                message: 'Thư điện tử không hợp lệ'
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Mật khẩu không được trống'
                            },
                        }
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: 'Mật khẩu xác nhận không được trống'
                            },
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                        //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
                    })
                }
            }
        ).on('core.form.valid', function () {
            // Show loading state on button
            KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Đang xử lý');
        }).on('core.form.invalid', function () {
            Swal.fire({
                text: 'Xin lỗi, hệ thống xác nhận có lỗi, vui lòng thử lại.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok, tôi hiểu!',
                customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary'
                }
            }).then(function () {
                KTUtil.scrollTop();
            });
        });
    }

    // Public Functions
    return {
        init: function () {
            _handleFormSignin();
            _handleFormForgot();
            _handleFormSignup();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    KTLogin.init();
});
