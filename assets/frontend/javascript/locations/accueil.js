$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    
    $('select').material_select();
    
    $('#TABLE_APPARTEMENTS').DataTable({
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/French.json"
            }
    });

    /*$("#listeAppartements").DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );*/
    
    $('.submitButton').prop('disabled', true);
    
    $("#typeBien").change(function(){
        var typeBien = $("#typeBien").val();
        
        if(typeBien == "MAISON"){
        	bloquerBlockAppartement();
        	debloquerBlockMaison();
            $('#blocMaison').show();
            $('#blocAppartement').hide();
            //toastMessage("orange", "La maison à bien été enregistrée", 4000);
            
            //Materialize.toast(message, 150000, 'card green');
            //$('.removeClass').removeClass('toast').removeClass('card');
        } else {
        	//$('#maisonAppartement option:first').prop('selected', true);
        	$('.numeroPorte').hide();
        	bloquerBlockMaison();
        	debloquerBlockAppartement();
            $('#blocMaison').hide();
            $('#blocAppartement').show();
        }
    });
    
    $("#maisonAppartement").change(function(){
		 if($("#maisonAppartement").val() == ""){
			 $(".numeroPorte").hide();
		 }else {
			 $(".numeroPorte").show();
		 }
    });
    
    function bloquerBlockMaison(){
	    $('#nom').prop('disabled', true);
	    $('#adresse').prop('disabled', true);
	    $('#codePostal').prop('disabled', true);
	    $('#ville').prop('disabled', true);
	    $('#maisonAppartement').prop('disabled', true);
    }
    
    function debloquerBlockMaison(){
	    $('#nom').prop('disabled', false);
	    $('#adresse').prop('disabled', false);
	    $('#codePostal').prop('disabled', false);
	    $('#ville').prop('disabled', false);
    }
    
    function bloquerBlockAppartement(){
	    $('#numero').prop('disabled', true);
	    $('#maisonAppartement').prop('disabled', true);
    }
    
    function debloquerBlockAppartement(){
	    $('#numero').prop('disabled', false);
	    $('#maisonAppartement').prop('disabled', false);
    }
    
    $("#ajouterValidation").on("click", function(){
    
    	var typeBien = $("#typeBien").val();
        console.log(typeBien);
    	
    	if(typeBien == "MAISON"){
	    	if(verifierFormulaireMaison() === true){
		    	ajouterMaison();
	    	} else {
                toastModalMessage("red", "Une erreur inconnue s'est produite, merci de réessayer ultérieurement.", 50);
            }
    	} else if(typeBien == "APPARTEMENT"){
            if(verifierFormulaireAppartement() === true){
		    	ajouterAppartement();
	    	} else {
                toastModalMessage("red", "Une erreur inconnue s'est produite, merci de réessayer ultérieurement.", 50);
            }
    	} else {
	    	toastModalMessage("red", "Une erreur inconnue s'est produite, merci de réessayer ultérieurement.", 50);
    	}
	   
    });
    
    /*$('#ajouterLocation').submit(function(e){
        e.preventDefault();
        
        var url = $("#url").val();
        console.log($(this).serialize());
        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),
            success: function(retour){
                
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });*/
    
    function verifierFormulaireMaison(){
    	var nom = $("#nom").val();
    	var adresse = $("#adresse").val();
    	var codePostal = $("#codePostal").val();
    	var ville = $("#ville").val();
    	
	    if(nom == ""){
		    toastModalMessage("red", "Veuillez saisir le nom de la maison", 400);
	    } else if(adresse == ""){
		    toastModalMessage("red", "Veuillez saisir l'adresse de la maison", 400);
	    } else if(codePostal == ""){
		    toastModalMessage("red", "Veuillez saisir le codePostal de la maison", 400);
	    } else if(ville == ""){
		    toastModalMessage("red", "Veuillez saisir le nom de la ville", 400);
	    } else {
		    return true;
	    }
    }

    function verifierFormulaireAppartement(){
    	var maisonAppartement = $("#maisonAppartement").val();
    	var numero = $("#numero").val();
    	
	    if(maisonAppartement == ""){
		    toastModalMessage("red", "Veuillez sélectionner la maison à laquelle vous souhaitez rattacher un appartement", 400);
	    } else if(numero == ""){
		    toastModalMessage("red", "Veuillez saisir le numéro de l'appartement", 400);
	    }else {
		    return true;
	    }
    }
    
    function ajouterMaison(){
        
        var url = $("#urlMaison").val();
        var libelle = $("#libelle").val();
    	var adresse = $("#adresse").val();
    	var codePostal = $("#codePostal").val();
    	var ville = $("#ville").val();
    	var idProprietaire = $("#idProprietaire").val();
    	var csrfTokenName = $("#csrfTokenName").val();
    	var csrfTokenValue = $("#csrfTokenValue").val();
        
        alert(csrfTokenName);
        alert(csrfTokenValue);
        
        var data = {
	        'libelle' : libelle,
	        'adresse' : adresse,
	        'codePostal' : codePostal,
	        'ville' : ville,
	        'idProprietaire' : idProprietaire
        }
        
		//'csrfTokenName' : csrfTokenName,
        //'csrfTokenName' : csrfTokenValue
        
        console.log(data);
        
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(retour){
                $('#modal1').closeModal();
                toastMessage("green", "La maison à bien été enregistrée", 4000);
                
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        })
    }
    
    function ajouterAppartement(){
        
        var url = $("#urlAppartement").val();
        var idLocation = $("#maisonAppartement").val();
    	var numero = $("#numero").val();
    	var csrfTokenName = $("#csrfTokenName").val();
    	var csrfTokenValue = $("#csrfTokenValue").val();
        
        
        
        var data = {
	        'idLocation' : idLocation,
	        'numero' : numero,
        }
        
		//'csrfTokenName' : csrfTokenName,
        //'csrfTokenName' : csrfTokenValue
        
        console.log(data);
        
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(retour){
                $('#modal1').closeModal();
                toastMessage("green", "L'appartement à bien été ajouté.", 4000);
                
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        })
    }
});



