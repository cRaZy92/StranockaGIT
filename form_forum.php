<form action="db_forum.php" method="post">
		<h2>Fórum!</h2>
		<br>Tvoja otázka: <br>
		<textarea ng-model="message" rows="2" cols="80" name="otazka" maxlength="500"></textarea> <br>		
		<p>
			<input type="submit" value="Odoslať správu" name="ok">
			<button ng-click="clear()">Zmazať</button>
		</p>
</form>

<p>Zostavajuci počet znakov: <span ng-bind="left()"></span></p>

<script>
var app = angular.module("myNoteApp", []); 
app.controller("myNoteCtrl", function($scope) {
    $scope.message = "";
    $scope.left = function() {
        return 500 - $scope.message.length;
    };
    $scope.clear = function() {
        $scope.message = "";
    };
});
</script>