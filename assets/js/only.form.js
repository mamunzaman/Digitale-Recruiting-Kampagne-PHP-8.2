
/************************
 * Kontact form only js here
 * ******************************
 */
function reloadPage(){
        location.reload(true);
    }
var href = document.location.href;
var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
//alert(lastPathSegment); 

// just for the demos, avoids form submit
/*jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});*/
var customText = "Bitte eingeben: ";
var formError = "Bitte füllen Sie alle markierten Felder aus.";
jQuery( "#popUpContactForm" ).validate({
	errorElement: 'span',
	ignore: "",

	invalidHandler: function(event, validator) {
    // 'this' refers to the form
    var errors = validator.numberOfInvalids();
    if (errors) {
      var message = errors == 1
        ? formError
        : formError;
      $("div.error span").html(message);
      $("div.error").show();
    } else {
      $("div.error").hide();
    }
  },
	rules: {
			firstname: {
                required: true
            },
			surname: {
                required: true
            },
			youremail: {
                required: true
            },
        formsteps: {
            required: false
        },
			/*yourmessage: {
                required: true
            },*/
        },
	errorPlacement: function(error,element) {
		jQuery(element).parent().addClass('input--filled');

		/*if (element.is('select')) {
                error.insertBefore(element);
			jQuery('.tt').addClass('choosetopic1');
            }  else {
                jQuery('.tt').addClass('choosetopic1');
            }*/

		if(element.attr("name") == "choosetopicname") {
			//error.appendTo( element.parent("div").next("div") );
			jQuery('.select-selected').addClass('errorLineClass');
		  } else {
			//error.insertAfter(element);
		  }

		//if (element.attr("type") == "input") {
			//error.insertAfter($(element).parents('div').prev($('.question')));
			jQuery(element).parent().find('.input__label').addClass('newErrorLine');
		//}

    return true;
  },
	submitHandler: function(form) {
        //alert("Do some stuff...");
		//jQuery('#onlyFormWrap, .thanskPageHide').hide();
		//jQuery('.thanskPage').fadeIn();

        $.ajax({
            url:'submitted_ajax_process.php',
            type:'POST',
            data: $('#popUpContactForm').serialize(),
            success: function(data) {
                //$("#block").html(data);
				console.log(data);
				if(data === "1"){
					window.location.href = "overview_mail.php";
				}else{
					$.magnificPopup.open({
						items: {
							src: '<div class="white-popup1">'+ data +'</div>', // can be a HTML string,
							// jQuery object, or CSS selector
							type: 'inline',
						}
					});
				}
            }
        });

        //submit via ajax
        return false;  //This doesn't prevent the form from submitting.
    }

    });





/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
//document.addEventListener("click", closeAllSelect);

	(function() {
		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		if (!String.prototype.trim) {
			(function() {
				// Make sure we trim BOM and NBSP
				var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
				String.prototype.trim = function() {
					return this.replace(rtrim, '');
				};
			})();
		}

		[].slice.call( document.querySelectorAll( 'input.input__field, textarea.input__field' ) ).forEach( function( inputEl ) {
			// in case the input is already filled..
			if( inputEl.value.trim() !== '' ) {
				classie.add( inputEl.parentNode, 'input--filled' );
			}

			// events:
			inputEl.addEventListener( 'focus', onInputFocus );
			inputEl.addEventListener( 'blur', onInputBlur );
		} );

		function onInputFocus( ev ) {
			classie.add( ev.target.parentNode, 'input--filled' );
		}

		function onInputBlur( ev ) {
			if( ev.target.value.trim() === '' ) {
				classie.remove( ev.target.parentNode, 'input--filled' );
			}
		}
	})();



jQuery(document).ready(function(){



	$('.card-no-data-click').click(function(){
		$get_url = jQuery(this).data('url');
		window.location.href = $get_url;
		return false;
	})

	/*******************
	 * this is index Start page selection
	 */
	$("#submit-request-email").submit(function(e){

		e.preventDefault(); // avoid to execute the actual submit of the form.

		$.ajax({
			type: "POST",
			url: 'submitted_ajax_process.php',
			data: $("#submit-request-email").serialize(),
			cache: false,
			before: function (data){
				//alert(data);
				//return false;
			},
			success: function(data) {
				//alert(data);
				console.log(data);
				$.magnificPopup.open({
					items: {
						src: '<div class="white-popup1">'+ data +'</div>', // can be a HTML string,
						// jQuery object, or CSS selector
						type: 'inline',
					}
				});
				//window.location.href = $dlink;
			},
			error: function(xhr, status, error) {
				console.error(xhr);
			}
		});
		return false;
	});

	$("#submit-request-email-bottom").submit(function(e){

		e.preventDefault(); // avoid to execute the actual submit of the form.

		$.ajax({
			type: "POST",
			url: 'submitted_ajax_process.php',
			data: $("#submit-request-email").serialize(),
			cache: false,
			before: function (data){
				//alert(data);
				//return false;
			},
			success: function(data) {
				//alert(data);
				console.log(data);
				$.magnificPopup.open({
					items: {
						src: '<div class="white-popup1">'+ data +'</div>', // can be a HTML string,
						// jQuery object, or CSS selector
						type: 'inline',
					}
				});
				//window.location.href = $dlink;
			},
			error: function(xhr, status, error) {
				console.error(xhr);
			}
		});
		return false;
	});

})