function rating(postid, rate) {
    if(postid !== '' && rate !== ''){

        var phpfile = ('config/rating.php');
        
        $.post(phpfile, {submit: 1, postid: postid, rate: rate}, function(data) {

          if (data == "1") {
            const id = document.getElementsByClassName("rating").length - postid;

            var div = document.getElementsByClassName("rating")[id]; 

            div.innerHTML = "<i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i>";

            for (let index = 0; index < rate; index++) {
                var star = document.getElementsByClassName("rating")[id]; 
                star.querySelectorAll("i")[index].style.color = "#d8b106";
            }
            }
    });
}
}

function ratingstarsin(postid,rate) {

    const id = document.getElementsByClassName("rating").length - postid;

    for (let index = 0; index < rate; index++) {
        var star = document.getElementsByClassName("rating")[id]; 
        star.querySelectorAll("i")[index].style.color = "#d8b106";
    }
}

function ratingstarsout(postid,rate) {
    const id = document.getElementsByClassName("rating").length - postid;
    
    for (let index = 0; index < rate; index++) {
        var star = document.getElementsByClassName("rating")[id]; 
        star.querySelectorAll("i")[index].style.color = "black";
    }
}


