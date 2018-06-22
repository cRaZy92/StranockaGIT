<form action="komentovanie.php" method="post" ng-app="myNoteApp" ng-controller="myNoteCtrl">
<textarea ng-model="message" cols="100" rows="5" name="komentar" maxlength="300"></textarea>

<p>
<input type="submit" value="Odoslať komentár" name="ok">
<button ng-click="clear()">Zmazať</button>
</p>

<p>Zostavajuci počet znakov: <span ng-bind="left()"></span></p>
</form>

<script>
var app = angular.module("myNoteApp", []); 
app.controller("myNoteCtrl", function($scope) {
    $scope.message = "";
    $scope.left = function() {
        return 300 - $scope.message.length;
    };
    $scope.clear = function() {
        $scope.message = "";
    };
});
</script>