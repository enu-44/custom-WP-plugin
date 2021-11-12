(function($) {
    setTimeout(function(){



     var iframe = $(".h5p-iframe");
     var elmnt = iframe[0].contentWindow.document;
     var questionnamee = elmnt.getElementsByClassName("submit")[0];
     $(questionnamee).click(function(){
        var answers = [];
        var iframe = $(".h5p-iframe");
        var elmnt = iframe[0].contentWindow.document;
        var questionname = elmnt.getElementsByClassName("h5p-open-ended-question-text");
        var questionans = elmnt.getElementsByClassName("h5p-open-ended-question-input");
        var qnar = [];
        var qna = [];
        $.each(questionans, function(index, item) {
            qna.push(item.value);
        });
        $.each(questionname, function(index, item) {
            qnar.push(item.innerText);
        });
        answers.push([qnar, qna]);
        $.ajax({
            type: "post",
            dataType: "json",
            url: wpAJAXurl,
            data: { answers: JSON.stringify({ answers }),
            action: "spanishanswers"
        },
        success: function(msg){
            console.log(msg);
        }
    });
        console.log(answers);

    });
 },5000); 
})( jQuery );