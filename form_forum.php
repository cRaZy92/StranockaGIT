<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Vytvoriť otázku</h4>
      </div>
      <div class="modal-body" >
      <form action="db_forum.php" method="post" ng-app="myNoteApp" ng-controller="myNoteCtrl">
      <label for="otazka"><b>Napíš svoju otázku.</b></label><br>
      <textarea ng-model="message" rows="2" cols="50" name="otazka" maxlength="500"></textarea> <br>
      <p>Zostavajuci počet znakov: <span ng-bind="left()"></span></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn btn-success" name="ok">Save</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--
<form action="db_forum.php" method="post">
		<h2>Fórum!</h2>
		<br>Tvoja otázka: <br>
		<textarea ng-model="message" rows="2" cols="80" name="otazka" maxlength="500"></textarea> <br>		
		<p>
			<input type="submit" value="Odoslať správu" name="ok">
			<button ng-click="clear()">Zmazať</button>
		</p>
</form>
-->


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