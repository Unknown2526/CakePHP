<?php
$this->extend('/Layout/default');
$urlToRestApi = $this->Url->build('/api/pays', true);
echo $this->Html->scriptBlock('var token = '.json_encode($this->request->getParam('_csrfToken')).';', ['block' => true]);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Pays/index', ['block' => 'scriptBottom']);
echo $this->Html->script('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit');
?>

<div ng-app="app">
    <div ng-controller="UsersController">
	<div id="login">
	<table border="1">
        <tr>
            <td class="badge badge-primary text-wrap">Email:</td>
            <td><input type="text" id="username" ng-model="username" /></td>
	</tr>
	<tr>
            <td class="badge badge-primary text-wrap">Password:</td>
            <td><input type="password" id="password" ng-model="password" /></td>
	</tr>
	</table>
            
	<div id="example1"></div> 
	<p style="color:red;">{{ captcha_status }}</p>
        
	<a class="btn btn-primary" ng-click="login()">Login</a><br />
	</div>         
        
	<a class="btn btn-primary" id="logout" ng-click="logout()">Logout</a><br />
	<table>
        <tr>
            <td class="badge badge-primary text-wrap">New password:</td>
            <td><input type="password" id="newPassword" ng-model="newPassword" /></td>
        </tr>
        </table>
	<a class="btn btn-primary" ng-click="changePassword()">Update your password</a><br />
    </div>
    <hr>
    
    <div ng-controller="PaysController">

        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" id="pays_code" ng-model="pays.pays_nom" /></td>
            </tr>
            <tr>
                <td>Currency:</td>
                <td><input type="text" id="pays_nom" ng-model="pays.pays_devise" /></td>
            </tr>

	</table>
	<a class="btn btn-primary" id="updateCountry" ng-click="updatePays(pays.pays_nom,pays.pays_devise)">Update country</a> 
	<a class="btn btn-primary" id="addCountry" ng-click="addPays(pays.pays_nom, pays.pays_devise)">Add country</a> 
        <br /> <br />
        <p style="color: green">{{message}}</p>
        <p style="color: red">{{errorMessage}}</p>
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Currency</th>
                        <th>Action</th>
                    </tr>
                </thead>
                        <tr ng-repeat="pay in pays">
                            <td>{{pay.pays_nom}}</td>
                            <td>{{pay.pays_devise}}</td>
                            <td>
                                <a id="edit" ng-click="getPays(pay.pays_code)">Edit</a>
                                <a id="delete" ng-click="deletePays(pay.pays_code)">Delete</a>
                            </td>
                        </tr>
            </table>
        </div>
    </div>