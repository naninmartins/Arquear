class People {

    constructor (inputCpfCnpj,inputPhone) {
        this._inputCpfCnpj =  $(inputCpfCnpj);
        this._useful = new Usefuls();
        this.initialize (inputPhone);
    }

    initialize (inputPhone) {
        this.cpfCnpjValidation();
        this._useful.phoneMask(inputPhone);
    }

    cpfCnpjValidation () {

        this._inputCpfCnpj.blur( e=>{
            let tam = $(e.target).val().length;
            let type = $(e.target).val()[3]
            //if tam 11 or 14 but in your 3 position haven't a "." is a CPF number
            if (tam == 11 || tam == 14 && type =='.' ) {
                //If CPF isn't valid set a Error on input
                (!this._useful.validateCPF($(e.target).val())) ? this._useful.putError($(e.target)[0],'CPF inválido!') : this._useful.removeError($(e.target)[0]);
                $(e.target).mask("999.999.999-99");
                $('.juridico').addClass("hidden");
            }
            //if tam 14 or 18 but in your 3 position have a "." is a CNPJ number
            if ( tam == 14 && type !='.' || tam == 18 ) {
                $(e.target).mask("99.999.999/9999-99");
                $('.juridico').removeClass("hidden");
            }
        });
        //reset mask each time that is selected
        this._inputCpfCnpj.select( e=>{
            $(e.target).unmask();
        });
    }

    // function to fill adresses, send array names of inputs of form
    fillAdress (postalCode,city,state,complement,neighborhood) {
        let el_postalCode = document.getElementById(postalCode);
        this._useful.setMask('99999-999',el_postalCode);

        el_postalCode.addEventListener('blur',() => {
            if (!el_postalCode.value) this._useful.putError(el_postalCode,'Preencha o CEP primeiro!');
            else {
                let url = `http://viacep.com.br/ws/${el_postalCode.value}/json/`;
                this.getAxios(url).then(response=>{

                    if(response.data.erro) {
                        this._useful.putError(el_postalCode,'CEP não encontrado!');
                    }
                    else {
                        this._useful.removeError(el_postalCode);
                        document.getElementById(city).value = response.data.localidade;
                        document.getElementById(state).value = response.data.uf;
                        document.getElementById(complement).value = response.data.complemento;
                        document.getElementById(neighborhood).value = response.data.bairro;
                    }
                }).catch( () =>{
                    this._useful.putError(el_postalCode,'CEP inválido!');
                });
            }
        });
    }


    async getAxios(url) {
        try {
            const response = await axios.get(url);
            return response;
        } catch (error) {
            console.log(error);
            return error;
        }
    }//'http://viacep.com.br/ws/39592000/json/'






}
