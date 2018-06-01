<form action="komentovanie.php" method="post">
<textarea ng-model="message" cols="70" rows="10" name="komentar" maxlength="300"></textarea>

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
