

 $(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() < 50){
                $(".navbar").css({"background-color":"transparent","background-image": "linear-gradient(326deg, transparent 0%, transparent 74%)",
    "padding": "45px 0"});

            }else{
                $(".navbar").css({"background-color":"#bd4f6c","background-image": "linear-gradient(326deg, #bd4f6c 0%, #d7816a 74%)",
    "padding": "7px 0"});
            }
        })
    })
