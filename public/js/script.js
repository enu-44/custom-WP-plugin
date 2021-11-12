(function($) {
	
$('#submitTest').click(function(){


	
	///('thatClass')
// parse multi
var scoreAll = 0;
var answers = [];
var iframe = $(".h5p-iframe");
$.each(iframe, function(index, item) {
	var elmnt = item.contentWindow.document;
	var questionname = elmnt.querySelector(".h5p-sc-question:first-child");
	if(questionname==null) return;
	var correct = elmnt.getElementsByClassName('h5p-sc-is-correcat')[0].classList.contains('h5p-sc-selected');
	var correctnd =  elmnt.getElementsByClassName('h5p-sc-is-correctscnd')[0].classList.contains('h5p-sc-selected');
	var wrong =  elmnt.getElementsByClassName('h5p-sc-is-wroang')[0].classList.contains('h5p-sc-selected');

	if(correct == correctnd  && correctnd == wrong){
		return;
	}
	var scoreInd = 0;
	if( correct ) scoreInd = 2;
	if( correctnd ) scoreInd = 1;
	scoreAll = scoreAll + scoreInd;
	answers.push([questionname.innerText, scoreInd ]);
});


// parse drag
//h5p-draggable

$.each(iframe, function(index, item) {
	var elmnt = item.contentWindow.document;
	var answerz = elmnt.getElementsByClassName('h5p-draggable');
	if(answerz == null) return;
	var scoreInd = 0;
	//var questionName = elmnt.getElementsByClassName('h5p-static')[0].innerText;
	$.each(answerz, function(indexz, itemz) {
		var regExpC = /Placed in dropzone/gm;
		var innerTextDraggable = itemz.innerText.search(regExpC);
		if(innerTextDraggable == -1) return;
		var regExpCn = /Grabbable/gm;
		var innerTextDraggableEl = itemz.innerText.search(regExpCn)+10;
		var answerID= itemz.innerText[innerTextDraggableEl];
		if(answerID == 2 ) scoreInd = 2;
		if(answerID == 3 ) scoreInd = 1;
		scoreAll = scoreAll + scoreInd;
		//answers.push([questionName, scoreInd]);

	});
});

// gauna varda, tada iesko to elemento per ta nice

//parse dictation
/*
$.each(iframe, function(index, item) {
	var rightName = item.contentWindow.document.getElementsByClassName("h5p-question-introduction");
	if(item.contentWindow.document.getElementsByClassName("h5p-dictation") == null ) return;
	var rightAnsLib = H5PIntegration.contents;
	var rightans;


	$.each(rightAnsLib, function(indexz, itemz) {
		if(itemz.title != rightName.innerText) return;
		var obj = JSON.parse(itemz.jsonContent);
		rightans=obj.sentences.text;
	});

	var s = "This., -/ is #! an $ % ^ & * example ;: {} of a = -_ string with `~)() punctuation";
	var punctuationless = rightans.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");
	var finalString = punctuationless.replace(/\s{2,}/g," ").trim().toLowerCase();

	var punctuationless1 = item.contentWindow.document.querySelector("input:first-child").value.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");
	var finalString1 = punctuationless1.replace(/\s{2,}/g," ").trim().toLowerCase();

	if(finalString1 == finalString){
		scoreAll=scoreAll+2;
	}

});
*/

// foreach visus ans per

//h5p-speak-the-words-interpreted-answer

//parse speach
$.each(iframe, function(index, item) {
	var elmnt = item.contentWindow.document;
	var interprettedAns = elmnt.getElementsByClassName('h5p-speak-the-words-interpreted-answer');
	if(interprettedAns == null) return; 
	var realAns = elmnt.getElementsByClassName('h5p-speak-the-words-correct-answer');
	var scoreInd= 0;
	$.each(realAns, function(indexz, itemz) {
		$.each(interprettedAns, function(indezx, itemzx) {
			if(itemz.innerText == itemzx.innerText && itemz == 0) scoreInd =2;
			if(itemz.innerText == itemzx.innerText && itemz == 0) scoreInd =1;
		});
	});
	scoreAll = scoreAll + scoreInd;
});

    if($('#deel1').length){
    	if(scoreAll<13 && scoreAll>=0){
    		window.location.href = "../resultaten?deel=1&r=0";
    	}
    	if(scoreAll<18 && scoreAll>12){
    		window.location.href = "../resultaten?deel=1&r=1";
    	}
    	if(scoreAll<23 && scoreAll>17){
    		window.location.href = "../resultaten?deel=1&r=2";
    	}
    }
    else if($('#deel2').length){
    	if(scoreAll<13 && scoreAll>=0){
    		window.location.href = "../resultaten?deel=2&r=0";
    	}
    	if(scoreAll<18 && scoreAll>12){
    		window.location.href = "../resultaten?deel=2&r=1";
    	}
    	if(scoreAll<23 && scoreAll>17){
    		window.location.href = "../resultaten?deel=2&r=2";
    	}
    }
    else if($('#deel3').length){
    	if(scoreAll<13 && scoreAll>=0){
    		window.location.href = "../resultaten?deel=3&r=0";
    	}
    	if(scoreAll<18 && scoreAll>12){
    		window.location.href = "../resultaten?deel=3&r=1";
    	}
    	if(scoreAll<23 && scoreAll>17){
    		window.location.href = "../resultaten?deel=3&r=2";
    	}
    }
    else if($('#deel4').length){
    	if(scoreAll<13 && scoreAll>=0){
    		window.location.href = "../resultaten?deel=4&r=0";
    	}
    	if(scoreAll<18 && scoreAll>12){
    		window.location.href = "../resultaten?deel=4&r=1";
    	}
    	if(scoreAll<23 && scoreAll>17){
    		window.location.href = "../resultaten?deel=4&r=2";
    	}
    }
    else if($('#deel5').length){
    	if(scoreAll<13 && scoreAll>=0){
    		window.location.href = "../resultaten?deel=5&r=0";
    	}
    	if(scoreAll<18 && scoreAll>12){
    		window.location.href = "../resultaten?deel=5&r=1";
    	}
    	if(scoreAll<23 && scoreAll>17){
    		window.location.href = "../resultaten?deel=5&r=2";
    	}
    }
    if($('#deel6').length){
    	if(scoreAll<13 && scoreAll>=0){
    		window.location.href = "../resultaten?deel=6&r=0";
    	}
    	if(scoreAll<18 && scoreAll>12){
    		window.location.href = "../resultaten?deel=6&r=1";
    	}
    	if(scoreAll<23 && scoreAll>17){
    		window.location.href = "../resultaten?deel=6&r=2";
    	}
    }
});
/*
Deel 1: 
0-12: advies BASICO 1
13-17: advies BASICO 2 met voorbereiding (“zelfstudie of bijles”)
18-22: advies minimaal BASICO 2, volgend deel.  
Deel 2:
0-11: advies BASICO 2
12-14: advies BASICO 3 met voorbereiding
15-20: advies minimaal BASICO 3, volgend deel.
Deel 3:
0-10: advies BASICO 3
11-13: advies INTERMEDIO 1 met voorbereiding
14-16: advies minmaal INTERMEDIO 1, volgend deel
Deel 4:
0-6: advies INTERMEDIO 1
7-10: advies minimaal INTERMEDIO 2, volgend deel


.h5p-joubelui-progressbar {
    display: none;
}
button.h5p-ssc-next-button.h5p-joubelui-button {
    display: none;
}
.h5p-question-check-answer{
	display: none;
}

*/})( jQuery );