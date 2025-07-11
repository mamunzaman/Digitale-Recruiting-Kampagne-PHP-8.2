
function reloadPage(){
        location.reload(true);
    }
var href = document.location.href;
var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
//alert(lastPathSegment);

if(lastPathSegment === "service.php"){
// Initialize the plugin
$('#fadeandscale').popup({

        transition: 'all 0.3s'

    });
}

	$('input.acceptplease0:checkbox').change(function(){
		if($(this).is(":checked")) {
			$(this).prev().find('.checkmark-checkbox').removeClass("accepterror");
			$('.acceptCustomText').hide();
		} else {
			$('.checkmark-checkbox').addClass("accepterror");
			$('.acceptCustomText').show();
		}
	});

	$('input.acceptplease1:checkbox').change(function(){
		if($(this).is(":checked")) {
			$(this).prev().find('.checkmark-checkbox').removeClass("accepterror");
			$('.acceptCustomText').hide();
		} else {
			$('.checkmark-checkbox').addClass("accepterror");
			$('.acceptCustomText').show();
		}
	});


$('input.acceptplease2:checkbox').change(function(){
		if($(this).is(":checked")) {
			$(this).prev().find('.checkmark-checkbox').removeClass("accepterror");
			$('.acceptCustomText').hide();
		} else {
			$('.checkmark-checkbox').addClass("accepterror");
			$('.acceptCustomText').show();
		}
	});
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
			/*yourmessage: {
                required: true
            },*/
		choosetopicname: {
                required: true
            },

			acceptplease: {
                required: true
            }
        },
	errorPlacement: function(error,element) {
		jQuery(element).parent().addClass('input--filled');
		if (element.attr("type") == "checkbox") {
			//error.insertAfter($(element).parents('div').prev($('.question')));
			jQuery(element).parent().find('.checkmark-checkbox').addClass('accepterror');
			jQuery(element).parent().find('.acceptCustomText').show();
		}

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
		jQuery('#onlyFormWrap, .thanskPageHide').hide();
		jQuery('.thanskPage').fadeIn();


        //submit via ajax
        return false;  //This doesn't prevent the form from submitting.
    }

    });




jQuery( "#popUpContactFormService" ).validate({
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
			yourmessage: {
                required: true
            }, 
			machineserialnumber: {
                required: true
            },
		machineserialdocu: {
                required: true
            },
			acceptplease: {
                required: true
            },
		choosetopicname: {
                required: true
            }
		
        }, 
	errorPlacement: function(error,element) {
		jQuery(element).parent().addClass('input--filled');
		if (element.attr("type") == "checkbox") { 
			//error.insertAfter($(element).parents('div').prev($('.question')));
			jQuery(element).parent().find('.checkmark-checkbox').addClass('accepterror');
			jQuery(element).parent().find('.acceptCustomText').show(); 
		} 
		
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
		jQuery('#onlyFormWrap, .thanskPageHide').hide();
		jQuery('.thanskPage').fadeIn();
		
		
        //submit via ajax
        return false;  //This doesn't prevent the form from submitting.
    }
	 
    });








jQuery( "#popUpContactFormNewsletter" ).validate({
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
			choosetopicname: {
                required: true
            },
			acceptplease: {
                required: true
            }

        },
	errorPlacement: function(error,element) {
		jQuery(element).parent().addClass('input--filled');
		if (element.attr("type") == "checkbox") {
			//error.insertAfter($(element).parents('div').prev($('.question')));
			jQuery(element).parent().find('.checkmark-checkbox').addClass('accepterror');
			jQuery(element).parent().find('.acceptCustomText').show();
		}

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
		jQuery('#onlyFormWrapTobacco, .thanskPageHideTobaccko').hide();
		jQuery('.thanskPageTobacco').fadeIn();


        //submit via ajax
        return false;  //This doesn't prevent the form from submitting.
    }

    });







var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("tt");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var i, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

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
 

