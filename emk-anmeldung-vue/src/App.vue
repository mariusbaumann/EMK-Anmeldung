<template>
<div>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img style="height: 60px" src="logo.jpg" /></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav"></ul>  
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="row">
      <div class="col-md-12">
        <h1 id="mainTitle">Registrierung für den Internen Bereich</h1>
        <h5 id="subTitle" class="margin-top">Hier können Sie Zugriffssrechte für den Internen Bereich der EMK Schweiz und/oder Ihres Bezirks beantragen. Zugriff auf die entsprechenden Ordner gewährt nach Ihrem Antrag der entsprechende Administrator. Es kann einige Tage dauern, bis die Zugriffsrechte erteilt werden und Sie die gewünschten Ordner sehen. Über den Fortschritt werden Sie per E-Mail benachrichtigt.</h5>
        <p></p>
        <div class="row ">
          <div class="col-md-12">
            <ul class="nav nav-tabs margin-top">
              <li class="nav-item" id="changeForm2">
                <a id="tr-userAndAccess" :class="['nav-link', tabstate === 'userAndPermission' ? 'active' : '' ]" href="#" @click="userAndPermission()">Benutzer erstellen und Zugriffsrechte beantragen</a>
              </li>
              <li class="nav-item" id="changeForm">
                <a id="tr-onlyAccess" :class="['nav-link', tabstate === 'permissionOnly' ? 'active' : '' ]"  href="#" @click="permissionOnly()">Nur Zugriffsrechte beantragen</a>
              </li>
            </ul>
          </div>
        </div>
        <form name="contact-form" action="" method="post" id="contact-form">
          <div class="form-group">
               
            <input-field @entredVal="storeField" id="email" name="E-Mail-Adresse" type="email" placeholder="" />
          
          
           <!--
             
             <label id="eMailAdress" for="exampleInputEmail1">E-Mail-Adresse</label>
            <input v-model="valEmail" @keyup="validateEMail()" id="inputEMailAdress" type="email" :class="['form-control', errEmail ? 'border-red' : '']" name="email" placeholder="" />
            <p id="eMailNotValid" v-show="errEmail">{{ errEmail }}</p>-->
            
          </div>
          <div id="alreadyExist" class="row" style="display: none">
            <div class="col-md-12">
              <p id="tr-adressAlreadyUsed">Diese E-Mail-Adresse wurde bereits registriert. Was möchten Sie tun?</p>
              <a id="tr-login" href="https://cloud.methodisten.ch" class="btn btn-primary" role="button">Einloggen</a>
              <p id="tr-oder" class="margin-top">oder</p>
            </div>
          </div>
          <div id="fullform">
            <div id="hide-range" v-if="tabstate === 'userAndPermission'">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <input-field @entredVal="storeField" id="firstname" name="Vorname" type="text" placeholder="" />
                  </div>
                  <div class="col-md-6">
                    <input-field @entredVal="storeField" id="lastname" name="Nachname" type="text" placeholder="" />
                  </div>
                </div>
              </div>
           <input-field @entredVal="storeField" id="username" name="Benutzername" type="username" placeholder="" />

              <!--<div class="form-group">
                <label id="Username" for="exampleInputEmail1">Benutzername</label>
                <input id="inputUsername" type="" class="form-control" name="username" placeholder="" >
                <p id="usernameNoUmlaut" style="display: none">Der Benutzername darf keine Umlaute enthalten.</p>
                <p id="usernameNoSpace" style="display: none">Der Benutzername darf keine Abstände enthalten.</p>
                <p id="usernameNoSpecial" style="display: none">Der Benutzername darf keine Sonderzeichen enthalten.</p>
                <p id="usernameAleradyExist" style="display: none">Dieser Benutzername wird schon verwendet.</p>
                <p id="usernameMandatory" style="display: none">Benutzername ist ein Pflichtfeld</p>
              </div> -->

            <input-field @entredVal="storeField" id="password" name="Passwort" type="password" placeholder="" />
              
              
              <!-- <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label id="lablePassword" for="Name">Passwort</label>
                    <div class="input-group">
                      <input id="password" type="password" class="form-control" name="password" placeholder="" >
                      
                      <div class="input-group-append">
                        <span id="validationLable" class="input-group-text">unsicher</span>
                      </div>
                    </div>
                    <p id="passwordValidMandatory" style="display: none">Passwort ist ein Pflichtfeld</p>
                    <p id="pw-description-id" class="pw-description">Das Passwort muss <span id="minEightChar" class="d-inline p-0 text-danger">mind. 8 Zeichen lang</span> sein und <span id="specialChar" class="d-inline p-0 text-danger">ein Sonderzeichen</span>, <span id="capitalChar" class="d-inline p-0 text-danger">einen Grossbuchstaben</span> und <span id="numberChar" class="d-inline p-0 text-danger">eine Zahl</span> enthalten.</p>
                  
                  </div>
                  <div class="col-md-6">
                    <label id="tr-passwordAgain" for="Name">Passwort wiederholen</label>
                    <input id="secondPassword" type="password" class="form-control" name="2ndpassword" placeholder="" >
                    <p id="passwordNotMatch"  style="display: none">Die Passwörter stimmen nicht überein.</p>
                    <p id="passwordRepeatValidMandatory" style="display: none">Passwort wiederholen ist ein Pflichtfeld</p>
                  </div> 
                </div>
              </div> -->
            </div>
            <div class="row">
              <div class="col-lg-12">
                <h4 id="tr-requestAccess">Zugriffsrechte beantragen</h4>
                <p id="tr-manual">Suchen Sie im Suchfeld nach den Ordnern, auf die Sie Zugriff erhalten wollen, und fügen Sie diese der Liste durch Anklicken hinzu.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 order-lg-2">
                <ul id="groupSelectedItems" class="list-group">
                  <li class="list-group-item">&nbsp;</li>
                </ul>
              </div>
              <div class="col-lg-6 col-lg-pull-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                  </div>  
                  <!--<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>-->
                  <input type="text" class="form-control input-group-middle" aria-label="" id="myInput">
                  
                  <div class="input-group-append">
                    <button id="groupListDrop" class="btn btn-outline-secondary dropdown-toggle" type="button"></button>
                  </div>
                </div><!-- /input-group -->
                <div id="myDropdown" class="dropdown-content">
                  <a id="loading" href="#about"><img src="Rolling-1s-200px.svg" class="img-small img-center"></a>
                </div>
                <p id="rightsNotChosen"  style="display: none">Sie haben noch keine Zugriffsrechte ausgewählt. </p>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
          </div>   
          <div class="row">
            <div class="col-md-12">
            <p id="tr-notFound">Sollten Sie Ihren Bezirk nicht finden, gibt es in Ihrem Bezirk noch keinen Internen Bereich. Wenden Sie sich in diesem Fall an Ihre Pfarrperson.</p>
              <input type="hidden" id="detectedLang" name="detectedLang" value="noDetection">
              <input type="hidden" id="sendSelectedGroupItems" name="sendSelectedGroupItems" value="noDetection">
              <input type="hidden" id="job" name="job" value="addUser">
              <!--<div class="g-recaptcha" data-sitekey="6Lc0hLQUAAAAADYin5_3nQuP_VoDR0P4mcPg7VtG"></div>-->
              <button id="submit_form" type="submit" class="btn btn-primary" name="submit" value="Submit" >Zugriffsrechte beantragen</button>
              <img id="loading-img" src="Rolling-2s-200px.svg" class="img-center">
              <p id="language"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="response_msg alert alert-success" style="display: none" >&nbsp;</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="https://cloud.methodisten.ch" id="login-button" style="display: none" class="btn btn-primary" role="button">Einloggen</a>
            </div>
          </div>
       
      </form>
       </div>
      </div>
    </div>
</div>

</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
import InputField from './components/inputField.vue';
//import { store } from './store'

export default {
  name: 'App',
  components: {
    InputField
    
  },
  data() {
    return {
      tabstate: "userAndPermission",
      //formdata: store.form,
      formdata: {email: '', username: ''},
    }
  
  },
  methods: {
    userAndPermission() {
      this.tabstate = "userAndPermission";
      console.log(this.tabstate)
    },
    permissionOnly() {
      this.tabstate = "permissionOnly";
      console.log(this.tabstate)
    },
    validateEMail() {
        if (this.valEmail.search('^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\\.[A-Za-z]+$') < 0) {
          this.errEmail = "Die E-Mail-Adresse ist ungültig";
        }else{
          this.errEmail = "";
        }
        this.errEmail = "Das Feld darf nicht leer sein";
    },
    emptyEMail() {
      if (this.valEmail == "") {
        this.errEmail = "Das Feld darf nicht leer sein";
      }
    },
    storeField(event) {
      console.log(event);
      this.formdata[event.id] = event.valField;
    }
  },
  computed: {

  },
  

}
</script>

<style>

</style>
