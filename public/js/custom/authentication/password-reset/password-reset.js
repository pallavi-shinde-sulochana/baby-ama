/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/extended/js/custom/authentication/password-reset/password-reset.js":
/*!*********************************************************************************************!*\
  !*** ./resources/assets/extended/js/custom/authentication/password-reset/password-reset.js ***!
  \*********************************************************************************************/
/***/ (() => {

eval(" // Class Definition\n\nvar KTPasswordResetGeneral = function () {\n  // Elements\n  var form;\n  var submitButton;\n  var validator; // Handle form\n\n  var handleForm = function handleForm(e) {\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    validator = FormValidation.formValidation(form, {\n      fields: {\n        'email': {\n          validators: {\n            notEmpty: {\n              message: 'Email address is required'\n            },\n            emailAddress: {\n              message: 'The value is not a valid email address'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        bootstrap: new FormValidation.plugins.Bootstrap5({\n          rowSelector: '.fv-row',\n          eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    }); // Handle form submit\n\n    submitButton.addEventListener('click', function (e) {\n      // Prevent button default action\n      e.preventDefault(); // Validate form\n\n      validator.validate().then(function (status) {\n        if (status === 'Valid') {\n          // Show loading indication\n          submitButton.setAttribute('data-kt-indicator', 'on'); // Disable button to avoid multiple click\n\n          submitButton.disabled = true; // Simulate ajax request\n\n          axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form)).then(function (response) {\n            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n            Swal.fire({\n              text: \"Please check your email to proceed with the password reset.\",\n              icon: \"success\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            }).then(function (result) {\n              if (result.isConfirmed) {\n                form.querySelector('[name=\"email\"]').value = \"\";\n              }\n            });\n          })[\"catch\"](function (error) {\n            var dataMessage = error.response.data.message;\n            var dataErrors = error.response.data.errors;\n\n            for (var errorsKey in dataErrors) {\n              if (!dataErrors.hasOwnProperty(errorsKey)) continue;\n              dataMessage += \"\\r\\n\" + dataErrors[errorsKey];\n            }\n\n            if (error.response) {\n              Swal.fire({\n                text: dataMessage,\n                icon: \"error\",\n                buttonsStyling: false,\n                confirmButtonText: \"Ok, got it!\",\n                customClass: {\n                  confirmButton: \"btn btn-primary\"\n                }\n              });\n            }\n          }).then(function () {\n            // always executed\n            // Hide loading indication\n            submitButton.removeAttribute('data-kt-indicator'); // Enable button\n\n            submitButton.disabled = false;\n          });\n        } else {\n          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n          Swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  }; // Public functions\n\n\n  return {\n    // Initialization\n    init: function init() {\n      form = document.querySelector('#kt_password_reset_form');\n      submitButton = document.querySelector('#kt_password_reset_submit');\n      handleForm();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTPasswordResetGeneral.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2V4dGVuZGVkL2pzL2N1c3RvbS9hdXRoZW50aWNhdGlvbi9wYXNzd29yZC1yZXNldC9wYXNzd29yZC1yZXNldC5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxzQkFBc0IsR0FBRyxZQUFZO0FBQ3JDO0FBQ0EsTUFBSUMsSUFBSjtBQUNBLE1BQUlDLFlBQUo7QUFDQSxNQUFJQyxTQUFKLENBSnFDLENBTXJDOztBQUNBLE1BQUlDLFVBQVUsR0FBRyxTQUFiQSxVQUFhLENBQVVDLENBQVYsRUFBYTtBQUMxQjtBQUNBRixJQUFBQSxTQUFTLEdBQUdHLGNBQWMsQ0FBQ0MsY0FBZixDQUNSTixJQURRLEVBRVI7QUFDSU8sTUFBQUEsTUFBTSxFQUFFO0FBQ0osaUJBQVM7QUFDTEMsVUFBQUEsVUFBVSxFQUFFO0FBQ1JDLFlBQUFBLFFBQVEsRUFBRTtBQUNOQyxjQUFBQSxPQUFPLEVBQUU7QUFESCxhQURGO0FBSVJDLFlBQUFBLFlBQVksRUFBRTtBQUNWRCxjQUFBQSxPQUFPLEVBQUU7QUFEQztBQUpOO0FBRFA7QUFETCxPQURaO0FBYUlFLE1BQUFBLE9BQU8sRUFBRTtBQUNMQyxRQUFBQSxPQUFPLEVBQUUsSUFBSVIsY0FBYyxDQUFDTyxPQUFmLENBQXVCRSxPQUEzQixFQURKO0FBRUxDLFFBQUFBLFNBQVMsRUFBRSxJQUFJVixjQUFjLENBQUNPLE9BQWYsQ0FBdUJJLFVBQTNCLENBQXNDO0FBQzdDQyxVQUFBQSxXQUFXLEVBQUUsU0FEZ0M7QUFFN0NDLFVBQUFBLGVBQWUsRUFBRSxFQUY0QjtBQUc3Q0MsVUFBQUEsYUFBYSxFQUFFO0FBSDhCLFNBQXRDO0FBRk47QUFiYixLQUZRLENBQVosQ0FGMEIsQ0E0QjFCOztBQUNBbEIsSUFBQUEsWUFBWSxDQUFDbUIsZ0JBQWIsQ0FBOEIsT0FBOUIsRUFBdUMsVUFBVWhCLENBQVYsRUFBYTtBQUNoRDtBQUNBQSxNQUFBQSxDQUFDLENBQUNpQixjQUFGLEdBRmdELENBSWhEOztB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O0FBQ2RyRCxNQUFBQSxJQUFJLEdBQUdzRCxRQUFRLENBQUNYLGFBQVQsQ0FBdUIseUJBQXZCLENBQVA7QUFDQTFDLE1BQUFBLFlBQVksR0FBR3FELFFBQVEsQ0FBQ1gsYUFBVCxDQUF1QiwyQkFBdkIsQ0FBZjtBQUVBeEMsTUFBQUEsVUFBVTtBQUNiO0FBUEUsR0FBUDtBQVNILENBMUg0QixFQUE3QixDLENBNEhBOzs7QUFDQW9ELE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBWTtBQUNsQ3pELEVBQUFBLHNCQUFzQixDQUFDc0QsSUFBdkI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9leHRlbmRlZC9qcy9jdXN0b20vYXV0aGVudGljYXRpb24vcGFzc3dvcmQtcmVzZXQvcGFzc3dvcmQtcmVzZXQuanM/MWFlZSJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxuLy8gQ2xhc3MgRGVmaW5pdGlvblxudmFyIEtUUGFzc3dvcmRSZXNldEdlbmVyYWwgPSBmdW5jdGlvbiAoKSB7XG4gICAgLy8gRWxlbWVudHNcbiAgICB2YXIgZm9ybTtcbiAgICB2YXIgc3VibWl0QnV0dG9uO1xuICAgIHZhciB2YWxpZGF0b3I7XG5cbiAgICAvLyBIYW5kbGUgZm9ybVxuICAgIHZhciBoYW5kbGVGb3JtID0gZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgLy8gSW5pdCBmb3JtIHZhbGlkYXRpb24gcnVsZXMuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIEZvcm1WYWxpZGF0aW9uIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246aHR0cHM6Ly9mb3JtdmFsaWRhdGlvbi5pby9cbiAgICAgICAgdmFsaWRhdG9yID0gRm9ybVZhbGlkYXRpb24uZm9ybVZhbGlkYXRpb24oXG4gICAgICAgICAgICBmb3JtLFxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIGZpZWxkczoge1xuICAgICAgICAgICAgICAgICAgICAnZW1haWwnOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWxpZGF0b3JzOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbm90RW1wdHk6IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbWVzc2FnZTogJ0VtYWlsIGFkZHJlc3MgaXMgcmVxdWlyZWQnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBlbWFpbEFkZHJlc3M6IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbWVzc2FnZTogJ1RoZSB2YWx1ZSBpcyBub3QgYSB2YWxpZCBlbWFpbCBhZGRyZXNzJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgcGx1Z2luczoge1xuICAgICAgICAgICAgICAgICAgICB0cmlnZ2VyOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5UcmlnZ2VyKCksXG4gICAgICAgICAgICAgICAgICAgIGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwNSh7XG4gICAgICAgICAgICAgICAgICAgICAgICByb3dTZWxlY3RvcjogJy5mdi1yb3cnLFxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlSW52YWxpZENsYXNzOiAnJyxcbiAgICAgICAgICAgICAgICAgICAgICAgIGVsZVZhbGlkQ2xhc3M6ICcnXG4gICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICApO1xuXG4gICAgICAgIC8vIEhhbmRsZSBmb3JtIHN1Ym1pdFxuICAgICAgICBzdWJtaXRCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgLy8gUHJldmVudCBidXR0b24gZGVmYXVsdCBhY3Rpb25cbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgLy8gVmFsaWRhdGUgZm9ybVxuICAgICAgICAgICAgdmFsaWRhdG9yLnZhbGlkYXRlKCkudGhlbihmdW5jdGlvbiAoc3RhdHVzKSB7XG4gICAgICAgICAgICAgICAgaWYgKHN0YXR1cyA9PT0gJ1ZhbGlkJykge1xuICAgICAgICAgICAgICAgICAgICAvLyBTaG93IGxvYWRpbmcgaW5kaWNhdGlvblxuICAgICAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24uc2V0QXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicsICdvbicpO1xuXG4gICAgICAgICAgICAgICAgICAgIC8vIERpc2FibGUgYnV0dG9uIHRvIGF2b2lkIG11bHRpcGxlIGNsaWNrXG4gICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5kaXNhYmxlZCA9IHRydWU7XG5cbiAgICAgICAgICAgICAgICAgICAgLy8gU2ltdWxhdGUgYWpheCByZXF1ZXN0XG4gICAgICAgICAgICAgICAgICAgIGF4aW9zLnBvc3Qoc3VibWl0QnV0dG9uLmNsb3Nlc3QoJ2Zvcm0nKS5nZXRBdHRyaWJ1dGUoJ2FjdGlvbicpLCBuZXcgRm9ybURhdGEoZm9ybSkpXG4gICAgICAgICAgICAgICAgICAgICAgICAudGhlbihmdW5jdGlvbiAocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBTaG93IG1lc3NhZ2UgcG9wdXAuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246IGh0dHBzOi8vc3dlZXRhbGVydDIuZ2l0aHViLmlvL1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiUGxlYXNlIGNoZWNrIHlvdXIgZW1haWwgdG8gcHJvY2VlZCB3aXRoIHRoZSBwYXNzd29yZCByZXNldC5cIixcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJzdWNjZXNzXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1wcmltYXJ5XCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKHJlc3VsdCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVzdWx0LmlzQ29uZmlybWVkKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tuYW1lPVwiZW1haWxcIl0nKS52YWx1ZSA9IFwiXCI7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgICAgICAgICAuY2F0Y2goZnVuY3Rpb24gKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGRhdGFNZXNzYWdlID0gZXJyb3IucmVzcG9uc2UuZGF0YS5tZXNzYWdlO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBkYXRhRXJyb3JzID0gZXJyb3IucmVzcG9uc2UuZGF0YS5lcnJvcnM7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb3IgKGNvbnN0IGVycm9yc0tleSBpbiBkYXRhRXJyb3JzKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICghZGF0YUVycm9ycy5oYXNPd25Qcm9wZXJ0eShlcnJvcnNLZXkpKSBjb250aW51ZTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZGF0YU1lc3NhZ2UgKz0gXCJcXHJcXG5cIiArIGRhdGFFcnJvcnNbZXJyb3JzS2V5XTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoZXJyb3IucmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IGRhdGFNZXNzYWdlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJlcnJvclwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAgICAgLnRoZW4oZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIGFsd2F5cyBleGVjdXRlZFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIEhpZGUgbG9hZGluZyBpbmRpY2F0aW9uXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLnJlbW92ZUF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIEVuYWJsZSBidXR0b25cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24uZGlzYWJsZWQgPSBmYWxzZTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIC8vIFNob3cgZXJyb3IgcG9wdXAuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246IGh0dHBzOi8vc3dlZXRhbGVydDIuZ2l0aHViLmlvL1xuICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJTb3JyeSwgbG9va3MgbGlrZSB0aGVyZSBhcmUgc29tZSBlcnJvcnMgZGV0ZWN0ZWQsIHBsZWFzZSB0cnkgYWdhaW4uXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uOiBcImVycm9yXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tcHJpbWFyeVwiXG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvLyBQdWJsaWMgZnVuY3Rpb25zXG4gICAgcmV0dXJuIHtcbiAgICAgICAgLy8gSW5pdGlhbGl6YXRpb25cbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgZm9ybSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9wYXNzd29yZF9yZXNldF9mb3JtJyk7XG4gICAgICAgICAgICBzdWJtaXRCdXR0b24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfcGFzc3dvcmRfcmVzZXRfc3VibWl0Jyk7XG5cbiAgICAgICAgICAgIGhhbmRsZUZvcm0oKTtcbiAgICAgICAgfVxuICAgIH07XG59KCk7XG5cbi8vIE9uIGRvY3VtZW50IHJlYWR5XG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcbiAgICBLVFBhc3N3b3JkUmVzZXRHZW5lcmFsLmluaXQoKTtcbn0pO1xuIl0sIm5hbWVzIjpbIktUUGFzc3dvcmRSZXNldEdlbmVyYWwiLCJmb3JtIiwic3VibWl0QnV0dG9uIiwidmFsaWRhdG9yIiwiaGFuZGxlRm9ybSIsImUiLCJGb3JtVmFsaWRhdGlvbiIsImZvcm1WYWxpZGF0aW9uIiwiZmllbGRzIiwidmFsaWRhdG9ycyIsIm5vdEVtcHR5IiwibWVzc2FnZSIsImVtYWlsQWRkcmVzcyIsInBsdWdpbnMiLCJ0cmlnZ2VyIiwiVHJpZ2dlciIsImJvb3RzdHJhcCIsIkJvb3RzdHJhcDUiLCJyb3dTZWxlY3RvciIsImVsZUludmFsaWRDbGFzcyIsImVsZVZhbGlkQ2xhc3MiLCJhZGRFdmVudExpc3RlbmVyIiwicHJldmVudERlZmF1bHQiLCJ2YWxpZGF0ZSIsInRoZW4iLCJzdGF0dXMiLCJzZXRBdHRyaWJ1dGUiLCJkaXNhYmxlZCIsImF4aW9zIiwicG9zdCIsImNsb3Nlc3QiLCJnZXRBdHRyaWJ1dGUiLCJGb3JtRGF0YSIsInJlc3BvbnNlIiwiU3dhbCIsImZpcmUiLCJ0ZXh0IiwiaWNvbiIsImJ1dHRvbnNTdHlsaW5nIiwiY29uZmlybUJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJyZXN1bHQiLCJpc0NvbmZpcm1lZCIsInF1ZXJ5U2VsZWN0b3IiLCJ2YWx1ZSIsImVycm9yIiwiZGF0YU1lc3NhZ2UiLCJkYXRhIiwiZGF0YUVycm9ycyIsImVycm9ycyIsImVycm9yc0tleSIsImhhc093blByb3BlcnR5IiwicmVtb3ZlQXR0cmlidXRlIiwiaW5pdCIsImRvY3VtZW50IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/extended/js/custom/authentication/password-reset/password-reset.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/extended/js/custom/authentication/password-reset/password-reset.js"]();
/******/ 	
/******/ })()
;