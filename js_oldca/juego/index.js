//Usage
//https://codecanyon.net/item/spin2win-wheel-spin-it-2-win-it/16337656?ref=chrisgannon
//http://preview.codecanyon.net/item/spin2win-wheel-spin-it-2-win-it/full_screen_preview/16337656?_ga=1.225779801.210001494.1491571662

//load your JSON (you could jQuery if you prefer)
function loadJSON(callback) {

  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './juego_json', true); 
  xobj.onreadystatechange = function() {
    if (xobj.readyState == 4 && xobj.status == "200") {
      //Call the anonymous function (callback) passing in the response
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}

//cada vez que se hace un lanzamiento
function myResult(e) {
  //e is the result object

    console.log(e);
    console.log('Spin Count: ' + e.spinCount + ' - ' + 'Win: ' + e.win + ' - ' + 'Message: ' +  e.msg);

    // if you have defined a userData object...
    if(e.userData){
      
      console.log('User defined score: ' + e.userData.score)

    }


 // puede probar que giran 
 
  if(e.spinCount == 1){
    // mostrar el progreso del juego cuando el spinCount es 3 
    console.log(e.target.getGameProgress());
    //reiniciarlo si te gusta 
    //e.target.restart();
  }  

}

//su propia función para capturar cualquier errores
function myError(e) {
  //e is un objeto error
  console.log('Cantidad de giros: ' + e.spinCount + ' - ' + 'Message: ' +  e.msg);

}

//cuando termina el juego
function myGameEnd(e) {
  //e es gameResultsArray

   var url = "/proc_modal_ticket/"+jQuery.base64.encode(minutes + ':' + seconds)+'/'+jQuery.base64.encode(1);
        jQuery('#modalMessage').modal({
            show:'true',
          remote:url,
        });                             


/*  
  alert('asd');
  console.log(e.results[0].userData.score);
  console.log("mi arreglo de resultado de terminación de juego");
  TweenMax.delayedCall(5, function(){
    //location.reload();
  })
*/

}

function init() {
    loadJSON(function(response) {
      // Parse JSON string to an object
      var jsonData = JSON.parse(response);
      //if you want to spin it using your own button, then create a reference and pass it in as spinTrigger
      var mySpinBtn = document.querySelector('.spinBtn');
      //create a new instance of Spin2Win Wheel and pass in the vars object
      var myWheel = new Spin2WinWheel();

      
      
      /*
        Spin2WinWheel.init
          init(vars:Object) - Function que Inicializa la instancia de la rueda(wheel). Acepta los siguientes elementos:
              onResult - Paso mi propia función de resultados. Se llama después de cada giro(spin).
              onGameEnd - Paso mi propia función de "final de juego". Llamada al final del juego(a menos que no haya límite en el número de vueltas(spins)).

              onError - Paso mi propia función de Error. 

              spinTrigger - Paso mi propia boton HTML o elemento trigger para  provocar el giro(spin). La variable clickToSpin debe ser  true en el JSON.

      */


      //WITH your own button
      
        myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError, spinTrigger:mySpinBtn});
      





      

      //jugar


          var play =0;

          //cuando se da click en boton, o se invoca el trigger('click')
         jQuery('body').on('click','.spinBtn', function (e) {  
           $('.spinBtn').css('pointer-events','none');
              jQuery.ajax({    
                      url : '/num_conteo',
                      data : { 
                        play: 1,
                      },
                      type : 'POST',
                      dataType : 'json',
                      success : function(data) {  
                      }
              });        
                        


         });


        

        var hash_url = window.location.pathname;

        if  (hash_url=="/registro_ticket") { //registro ticket
            
            jQuery.ajax({
                      url : '/num_conteo',
                      data : { 
                        //play: play,
                      },
                      type : 'POST',
                      dataType : 'json',
                      success : function(data) {  
                          play = data.play;

                      if (  ((localStorage.getItem('miTiempo') !="0:00") && (localStorage.getItem('miTiempo').substring(0, 1) !="-") ) &&
                            (play==1) ) {
                          $('.spinBtn').trigger('click');   
                      }  

                      if   (  (data.registro_ticket==true) )  {  //validar si le toca jugar o registrar ticket 

                        if (data.tiempo != "0:00") { //es la primera vez que entra es decir es igual a 5:00
                          localStorage.setItem('miTiempo',  data.tiempo_comienzo );
                        } 
                        
                        var timer2 = localStorage.getItem('miTiempo');  

                        


                        var interval = setInterval(function() {

                          //si llego a cero o es menor que cero
                          if (  ((localStorage.getItem('miTiempo') =="0:00") || (localStorage.getItem('miTiempo').substring(0, 1) =="-") ) &&
                            (play==0) ) {
                                   $('.spinBtn').trigger('click');
                          }


                                var timer = timer2.split(':');
                                //by parsing integer, I avoid all extra string processing
                                minutes = parseInt(timer[0], 10);
                                seconds = parseInt(timer[1], 10);
                                --seconds;
                                minutes = (seconds < 0) ? --minutes : minutes;
                                if (minutes < 0) clearInterval(interval);
                                seconds = (seconds < 0) ? 59 : seconds;
                                seconds = (seconds < 10) ? '0' + seconds : seconds;
                                //minutes = (minutes < 10) ?  minutes : minutes;
                                if (localStorage.getItem('miTiempo').substring(0, 1) !="-"){
                                  $('.countdown').html(minutes + ':' + seconds);
                                } else {
                                    $('.countdown').html('0:00');
                                } 

                                timer2 = minutes + ':' + seconds;
                                localStorage.setItem('miTiempo', minutes + ':' + seconds);

                                if (localStorage.getItem('miTiempo').substring(0, 1) =="-"){
                                    $('.countdown').html('0:00');
                                }   

                        }, 1000)  //fin del tiempo interval
                    } //if   (  (data.registro_ticket==true) )  {   

                  } //fin del success
            });  // fin jQuery.ajax
        }  //fin de registro de ticket  

      
      //WITHOUT your own button
      //myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError});


    });

}

var minutes;
var seconds;
//And finally call it
init();
