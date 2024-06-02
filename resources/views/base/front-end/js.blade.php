<script type="text/javascript">
	// console.log('fuck');	
	/*function orcaEditorPrepareJson(){
		let ourarray = []
   		document.querySelectorAll(".editable").forEach((item) => {
      		ourarray[item.id]=item.getInnerHTML();
    	});
   		// console.log(ourarray);
	     // result = JSON.stringify(ourarray);
	     result  = JSON.stringify(Object.assign({}, ourarray))
   		// console.log(result);
   		return result;
	}*/

	function orcaEditorPrepareJson() {
	  let ourarray = [];
	  document.querySelectorAll(".editable").forEach((item) => {
	    ourarray[item.id] = item.getInnerHTML();
	    switch (item.nodeName) {
	      case "A":
	        if(typeof(item.innerHTML)=='String'){

	        	ourarray[item.id] = [item.innerHTML, item.href];
	        }else{
	        	ourarray[item.id] = ['', item.href];
	        }
	        break;
	      case "IMG":
	        ourarray[item.id] = [item.src];
	        break;
	      default:
	        ourarray[item.id] = item.innerHTML;
	        break;
	    }
	  });
	  // console.log(ourarray);
	  result = JSON.stringify(Object.assign({}, ourarray));
	  return result;
	}

	function orcaEditortoggleEdit() {

	   // let ourarray = []
	   // document.querySelectorAll(".editable").forEach((item) => {
	   //    ourarray[item.id]=item.getInnerHTML();
	   //  });
	   // console.log(ourarray);

	  // let sugunaDocs = JSON.parse(localStorage.getItem("sugunaDocs"));
	  // console.log(sugunaDocs);
	  if (sugunaDocs.editable === "true") {
	    sugunaDocs.editable = "false";
	    localStorage.setItem("sugunaDocs", JSON.stringify(sugunaDocs));
	    document.querySelectorAll(".editable").forEach((item) => {
	      item.contentEditable = false;
	      switch (item.nodeName) {
	        case "IMG":
	          let inputField = document.getElementById(item.id + "URL");
	          inputField && (inputField.style.display = "none");
	          break;
	        case "A":
	          let anchorInputField = document.getElementById(item.id + "URL");
	          anchorInputField && (anchorInputField.style.display = "none");
	          break;
	        default:
	          break;
	      }
	    });
	    handleButtons(false);
	  } else {
	    sugunaDocs.editable = "true";
	    localStorage.setItem("sugunaDocs", JSON.stringify(sugunaDocs));
	    document.querySelectorAll(".editable").forEach((item) => {
	      item.contentEditable = true;
	       switch (item.nodeName) {
	        case "IMG":
	          let inputField = document.getElementById(item.id + "URL");
	          inputField && (inputField.style.display = "block");
	          break;
	        case "A":
	          let anchorInputField = document.getElementById(item.id + "URL");
	          anchorInputField && (anchorInputField.style.display = "block");
	          break;
	        default:
	          break;
	      }
	    });
	    handleButtons(true);
	  }
	}

	function orcaEditorInit() {
	  let fetchedDocs = JSON.parse(localStorage.getItem("sugunaDocs"));
	  if (fetchedDocs === null) {
	    localStorage.setItem("sugunaDocs", JSON.stringify(sugunaDocs));
	    fetchedDocs = sugunaDocs;
	  }
	  assignValues(fetchedDocs);
	}

	
	function handleButtons(value) {
	  if (value) {
	    editSaveButton.innerHTML = "Save Contents";
	    editSaveButton.setAttribute(
	      "style",
	      "background-color:#6C55F9; color:white; font-weight:bold"
	    );
	    jQuery('#updateSaveButton').css({'display':'inline-block','background-color':'#6C55F9','color':'white'});
	     jQuery('#editSaveButton').css({'display':'none'});
	    
	  } else {
	    editSaveButton.innerHTML = "Edit Contents";
	    editSaveButton.setAttribute(
	      "style",
	      "background-color:#FF4943; color:white; font-weight:bold"
	    );

	    jQuery('#updateSaveButton').css('display','none');
	    jQuery('#editSaveButton').css({'display':'inline-block'});
	  }
	}
	function updateValue(id) {
	  let sugunaDocs = JSON.parse(localStorage.getItem("sugunaDocs"));
	  let element = document.getElementById(id);
	  sugunaDocs[id] = element.innerHTML;
	  localStorage.setItem("sugunaDocs", JSON.stringify(sugunaDocs));
	}
	function updateImage(id) {
	  let UrlInputField = document.getElementById(id);
	  let imageElement = document.getElementById(id.slice(0, -3));
	  imageElement.src = UrlInputField.value;
	}

	function updateAnchor(id) {
	  let inputField = document.getElementById(id);
	  let anchorElement = document.getElementById(id.slice(0, -3));
	  anchorElement.href = inputField.value;
	}

	function orcaEditorupdateSaveButton(){
		// jQuery('#updateSaveButton').css('display','none');
		// sugunaMethod
		// sugunaEndpoint
		var currentDoc =orcaEditorPrepareJson();
		// let currentDoc = JSON.parse(localStorage.getItem("sugunaDocs"));
		// var currentDoc =sugunaDocs;
		// console.log(data);
		// var data = {
		//         Name: 'bava',
		//         Address: 'addres',
		//         Phone: '78787'
		//     };
		var prepareData={
			// doc:JSON.stringify(currentDoc),
			doc:currentDoc,
			id:sugunaDocId,
			pageName:pageName,
		}
		// console.log(prepareData);
		jQuery.ajax({
			headers: {
		        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
		    },
            type: sugunaMethod,
            url: sugunaEndpoint,
            // data: JSON.stringify(currentDoc),
            // data: {doc:JSON.stringify(currentDoc)},
            // data: JSON.stringify(data),
            data: prepareData,
            // contentType: "application/json; charset=utf-8",
            // traditional: true,
            success: function (response) {
            	// var returnedData = JSON.parse(response);
            	if(response.success){
            		// alert(response.message);
            		Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: response.message,
					  showConfirmButton: false,
					  timer: 1500
					})
            	}

                // alert('Data saved')
                // console.log(data);
            }
        });
	}




function orcaSendEmail(form,subject,content,to){
	jQuery.ajax({
			headers: {
		        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
		    },
            type: 'post',
            url: '',
            // data: JSON.stringify(currentDoc),
            // data: {doc:JSON.stringify(currentDoc)},
            // data: JSON.stringify(data),
            data: prepareData,
            // contentType: "application/json; charset=utf-8",
            // traditional: true,
            success: function (response) {
            	// var returnedData = JSON.parse(response);
            	if(response.success){
            		// alert(response.message);
            		Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: response.message,
					  showConfirmButton: false,
					  timer: 1500
					})
            	}

                // alert('Data saved')
                // console.log(data);
            }
        });
}


function setEmailAddress(data){
	var em =jQuery(data).find(':selected').data('email');

	if(em){
		jQuery('#emailToFinal').val(em);
	}
	// console.log(em);
}

</script>
<style type="text/css">
	/*button#editSaveButton, a#editSaveButton {
	    position: fixed;
	    top: 22px;
	    z-index: 99999;
	    left: 29%;
	}
	#backtoPage{
		position: fixed;
	    top: 22px;
	    z-index: 99999;
	    left: 40%;
	}
	button#updateSaveButton{
		position: fixed;
	    top: 22px;
	    z-index: 99999;
	    left: 39%;
	    background-color:#6C55F9; 
	    color:white; 
	    font-weight:bold
	}*/
	#editPageButton{
		 position: fixed;
	    top: 22px;
	    z-index: 99999;
	    left: 29%;
	}
	#updateSaveButton{
		display: none;
	}

	.orcaEditorArea {
	    position: fixed;
	    top: 5px;
	   
	    z-index: 999999;
	    background: black;
	    width: 100%;
	    height: 52px;
	    margin-left: 30%;
	    margin-top: 17px;
	}
	.orcaEditorArea .btn{
		background: black;
    	padding: 5px;
	}
	.orcaEditorArea .btn:hover {
	    background: red;
	    color: black;
	}
	.swal2-container.swal2-top-end.swal2-backdrop-show {
    	z-index: 99999999;
	}
	.editableHidden{
		display: none; 
		width: 350px;
	}

</style>