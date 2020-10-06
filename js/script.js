    	
        //New lot booking
        
        $(document).ready(function(){
    		$('#registered').click(function(){
    			$('#vehicleNo').removeClass('hideVehicleNo');
    			$('#vNumberRow').removeClass('hideVehicleNo');
    		});
    		$('#common').click(function(){
    			$('#vehicleNo').addClass('hideVehicleNo');
    			$('#vNumberRow').addClass('hideVehicleNo');
    		});

            $('#bookLot').click(function(){
                var specificVehicle = document.getElementById('registered');
                if (specificVehicle.checked == true) {
                    var vNumber = $("#vehicleNo").val();
                    if (vNumber == '') {
                        alert('Vehicle number can\'t be empty');
                        window.location.href='../bookLot.php'
                    } else{
                        $.ajax({
                            url: "bookLotBackend.php",
                            type:"POST",
                            data : $("#lotBookingForm").serialize(),
                            success:function(result){
                                $("#success").html(result);
                            }
                        });
                    }    
                } else{
                    $.ajax({
                        url: "bookLotBackend.php",
                        type:"POST",
                        data : $("#lotBookingForm").serialize(),
                        success:function(result){
                            $("#success").html(result);
                        }
                    });
                }                    
            });
    	});


        //Logout confirmation
        function areYouSure(){
            // var answer = confirm('Do you really want to logout?');
            // if (answer) {
            //     window.location.href='logout.php';
            // }
            $( "#dialog-logout" ).dialog({
                draggable:false,
                resizable: false,
                height: 190,
                width: 400,
                modal: true,
                buttons: {
                    "Logout": function() {
                        window.location.href='logout.php';
                    },
                    "Cancel": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        }


        //Get token numbers according to the vehicle type
        function getTokens(typeTitle){
            $.ajax({
                url:'getTokens.php',
                type:'POST',
                data:{typeTitle : typeTitle},
                success:function(result){
                    $('#getToken').html(result);
                }
            });
        }

        

        //Fetching reserved lots of current user
        $(document).ready(function(){
           getReservations();
           hideDialogContent();
        });
            function getReservations(){
                var clientId = $("#hiddenClientId").val();
                $.ajax({
                    url:"getReservations.php",
                    type:"POST",
                    data:{clientId : clientId},
                    success:function(result){
                        $("#myReservations").html(result);
                    }
                });
            }

        function deleteReservation(lotId){
            var userConfirmation = confirm("Do you really want to delete this reservation? ");
            if (userConfirmation) {
                $.ajax({
                    url:"deleteReservation.php",
                    type:"POST",
                    data:{lotId : lotId},
                    success:function(result){
                        $("#successMessage").html(result);
                        getReservations();
                    }
                });
            }
        }

        function hideDialogContent(){
            $("#dialog-confirm").hide();
            $("#dialog-logout").hide();
        }

        $("#deleteAll").click(function(){
            var clientId = $("#hiddenClientId").val();
            $( "#dialog-confirm" ).dialog({
                draggable:false,
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Yes, Delete": function() {
                        $.ajax({
                            url:"deleteReservation.php",
                            type:"POST",
                            data:{clientId : clientId},
                            success:function(result){
                                $("#successMessage").html(result);
                                getReservations();
                            }
                        });
                        $( this ).dialog( "close" );
                    },
                    "No": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });
            
        
