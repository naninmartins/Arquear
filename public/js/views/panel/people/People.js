class People {

    constructor (inputCpfCnpj,inputPhone,form) {
        this._inputCpfCnpj =  $(inputCpfCnpj);
        this._useful = new Usefuls();
        this._form = document.querySelector(form);

        this.initialize (inputPhone);
    }

    initialize (inputPhone) {
        this.cpfCnpjValidation();
        this._useful.phoneMask(inputPhone);
        this.validateForm();
    }

    cpfCnpjValidation () {
        this._inputCpfCnpj.blur( e=>{
            let tam = $(e.target).val().length;
            let type = $(e.target).val()[3]
            //if tam 11 or 14 but in your 3 position haven't a "." is a CPF number
            if (tam == 11 || tam == 14 && type =='.' ) {
                //If CPF isn't valid set a Error on input
                (!this._useful.validateCPF($(e.target).val())) ? this._useful.setError($(e.target)[0],'CPF inválido!') : this._useful.removeError($(e.target)[0]);
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
            if (!el_postalCode.value) this._useful.setError(el_postalCode,'Preencha o CEP primeiro!');
            else {
                let url = `http://viacep.com.br/ws/${el_postalCode.value}/json/`;

                this.getAxios(url).then(response=>{

                    if(response.data.erro) {
                        //if object response return attr erro true the postal code did not found
                        this._useful.setError(el_postalCode,'CEP não encontrado!');
                        this._useful.clearInputs('formAdresses');
                    }
                    else {
                        this._useful.removeError(el_postalCode);
                        //fill each input with value from sync await response
                        document.getElementById(city).value = response.data.localidade;
                        document.getElementById(state).value = response.data.uf;
                        document.getElementById(complement).value = response.data.complemento;
                        document.getElementById(neighborhood).value = response.data.bairro;

                        document.querySelector('#street').classList.remove('hidden');
                    }
                }).catch( () =>{
                    //some else error code such as 404 code tell us that postal code isn't valid
                    this._useful.setError(el_postalCode,'CEP inválido!');
                    this._useful.clearInputs('.formAdresses');
                });
                //document.querySelector('#street').setAttribute('disabled','true');
                document.querySelector('#street').classList.add('hidden');
            }
        });
    }

    async getAxios(url) {
        try {
            const response = await axios.get(url);
            console.log(response)
            return response;
        } catch (error) {
            console.log(error);
            return error;
        }
    }//'http://viacep.com.br/ws/39592000/json/'  link get api

    validateForm () {
        //console.log(this._form);
        this._form.addEventListener('submit', e=>{
            e.preventDefault();
            (this._useful.validateInputs('.form')) ? e.submit() : false;
        });
    }
}
