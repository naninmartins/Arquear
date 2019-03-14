class People {

    constructor () {


    }

    CPF () {

        $( "#cnpjCpf" ).blur( e=>{
            let tam = $(e.target).val().length;
            let type = $(e.target).val()[3]
            if (tam == 11 || tam == 14 && type =='.' ) {

                (!ValidateCPF($(e.target).val())) ? this.putError($(e.target)[0],'CPF inválido!') : this.removeError($(e.target)[0]);

                $(e.target).mask("999.999.999-99");
                $('.juridico').addClass("hidden");
            }
            if ( tam == 14 && type !='.' || tam == 18 ) {
                $(e.target).mask("99.999.999/9999-99");
                $('.juridico').removeClass("hidden");
            }
        });

        $("#cnpjCpf").select( e=>{
            $(e.target).unmask();
        });
    }

    Phone () {
        $('.phone').blur(e=>{
            ($(e.target).val().length == 10) ? $(e.target).mask("(99)9999-9999") : $(e.target).mask("(99)99999-9999");
        });

        $(".phone").select( e=>{
            $(e.target).unmask();
        });
    }

    putError (element, text = '') {
        let div = element.parentElement;
        div.classList.add("has-error");
        div.querySelector('div > span').innerHTML = text;
    }

    removeError (element) {
        let div = element.parentElement;
        div.classList.remove("has-error");
        div.querySelector('div > span').innerHTML = '';
    }
}
