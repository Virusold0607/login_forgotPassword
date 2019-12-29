
function backgroundChange(){
    var image_container = ['background-image.jpg','bg2.jpg','bg3.jpg','bg4.jpg','bg5.jpg','bg6.jpg','bg7.jpg','bg8.jpg'];
    
    var random_number = Math.floor(Math.random() * 8);
    
    var body_element = document.body.style;
    /*setting css properties*/ 
    body_element.backgroundImage = 'url(../images/' + image_container[random_number] + ')';
    body_element.backgroundSize = "cover";
    body_element.backgroundRepeat = 'no-repeat';
    body_element.height = "100vh";
    body_element.width = "100%";
    
}
backgroundChange();

