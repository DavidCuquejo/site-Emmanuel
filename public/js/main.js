// Nav slideToggle

$(document).ready(function(){

    $('i.icon').click(function(){
        $('.nav-list').slideToggle("slow")
    });

    $('i.icon1').click(function(){
        $('.nav-list1').slideToggle("slow")
    });

// FAQ 

    var acc = document.getElementsByClassName("accordion");
    var i;

    for(i = 0; i < acc.length; i++){
        acc[i].addEventListener("click", function(){
            this.classList.toggle("active");

            var panel = this.nextElementSibling;
            
            if(panel.style.display === "block"){
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
});