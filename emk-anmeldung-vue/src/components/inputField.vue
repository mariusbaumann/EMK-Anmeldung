<template>
<div>
<div v-if="type !== 'password'">
            <label >{{name}}</label><span v-show="err" class="badge badge-danger float-right">{{ err }}</span>
            <input v-model="valField" @keyup="validateField()" @blur="activateValidation()" :class="['form-control', err ? 'border-red' : '']" :name="[name]" :placeholder="[placeholder]" />
            
</div>
<div v-if="type === 'password'">
            <div class="row mt-3">
                  <div class="col-md-6">
                    <label >{{ name }}</label><span v-show="err" class="badge badge-danger float-right">{{ err }}</span>
                    <div class="input-group">
                      <input v-model="valField" @keyup="validateField()" @blur="activateValidation()"  type="password" :class="['form-control', err ? 'border-red' : '']" placeholder="" >
                      <div class="input-group-append">
                        <span class="input-group-text">{{safe}}</span>
                      </div>
                    </div>
                    
                    <p id="pw-description-id" class="pw-description">Das Passwort muss <span id="minEightChar" :class="['d-inline', 'p-0', eightChar ? 'text-success' : 'text-danger']">mind. 8 Zeichen lang</span> sein und <span id="specialChar" :class="['d-inline', 'p-0', specialChar ? 'text-success' : 'text-danger']">ein Sonderzeichen</span>, <span id="capitalChar" :class="['d-inline', 'p-0', upperChar ? 'text-success' : 'text-danger']">einen Grossbuchstaben</span> und <span id="numberChar" :class="['d-inline', 'p-0', numberChar ? 'text-success' : 'text-danger']">eine Zahl</span> enthalten.</p>
                  </div>
                  <div class="col-md-6">
                    <label id="tr-passwordAgain" for="Name">{{ name }} wiederholen</label><span v-show="err2" class="badge badge-danger float-right">{{ err2 }}</span>
                    <input v-model="valField2" @keyup="validateField('2nd')" @blur="activateValidation('2nd') " id="secondPassword" type="password" :class="['form-control', err2 ? 'border-red' : '']" name="2ndpassword" placeholder="" >
                  </div> 
                </div>
            </div>
        </div>
</template>

<script>


import {store} from '../store'


export default {
    name: "inputField",
    props: ['id', 'name', 'type', 'placeholder'],
    data() {
        return {
            formdata: store.form,
            valField: "",
            valField2: "",
            err: "",
            err2: "",
            validation: false,
            validation2: false,
            eightChar: false,
            specialChar: false, 
            upperChar: false,
            numberChar: false,
            safe: "unsicher"
        }
    },
    methods: {
        activateValidation(flip) {
            if (flip === "2nd") {
                 this.validation2 = true;
            } else {
                 this.validation = true;
            }

            this.validateField();
        },
        validateField(flip) {
            // Emitting value Back realtime except it is a password field
            if (this.type === "password") {
                if (this.valField === this.valField2) {
                    this.$emit('entredVal', { 'id': this.id, 'valField' : this.valField, 'err': this.err});
                    this.err2 = "";
                } else {
                    if (this.validation && this.validation2) {
                        this.err2 = "Passwörter stimmen nicht überein";
                    }
                    this.$emit('entredVal', { 'id': this.id, 'valField' : '', 'err': this.err2});
                }
            } else {
                this.$emit('entredVal', { 'id': this.id, 'valField' : this.valField, 'err': this.err});
            }
            if (this.validation) {
                if (this.valField === "") {
                    if (flip === "2nd") {
                        this.err2 = "Das Feld darf nicht leer sein";
                    } else {
                        this.err = "Das Feld darf nicht leer sein";
                    }
                   
                    return;
                }    
                if (this.type === "email") {
                    if (this.valField.search('^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\\.[A-Za-z]+$') < 0) {
                        this.err = "Die E-Mail-Adresse ist ungültig";
                        return;
                    }
                }
                if (this.type == "username") {
                    if (this.valField.search('^(?=.*[äöüÄÖÜ])') != -1) {
                        this.err = "Der Benutzername darf keine Umlaute enthalten"
                        return;
                    }
                    if (this.valField.search('^(?=.*[\\s])') != -1) {
                        this.err = "Der Benutzername darf keine Leerzeichen enthalten"
                        return;
                    }
                    if (this.valField.search('^(?=.*[^äöüa-zA-Z\\d])') != -1) {
                        this.err = "Der Benutzername darf keine Sonderzeichen enthalten"
                        return
                    }
                }
                
                this.err = "";
                
            }
            if (this.type === "password") {
                if (this.valField.search('^.{8,}$') < 0) {
                    this.eightChar = false;
                } else {
                    console.log("say");
                    this.eightChar = true;
                }
                if(this.valField.search('^(?=.*[^ÄÖÜäöüa-zA-Z\\d])') < 0) {
                    this.specialChar = false; 
                } else {
                    this.specialChar = true;
                }
                if(this.valField.search('^(?=.*[ÄÖÜA-Z])') < 0) {
                    this.upperChar = false;
                } else {
                    this.upperChar = true;
                }
                if(this.valField.search('^(?=.*[0-9])') < 0) {
                    this.numberChar = false;
                } else {
                    this.numberChar = true;
                }
                if(this.eightChar && this.specialChar && this.upperChar && this.numberChar) {
                    this.safe = "sicher";
                } else {
                    this.safe = "unsicher";
                }
            }
        }
    }
}
</script>

<style scoped>

</style>