//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('filmsController', function($scope, $http) {
  getFilmsData(); // Load all available films and their comments

  $scope.searchString = "";
  $scope.sortBy = "title";
  $scope.reverseSort = true;

  function getFilmsData() {
    $http.get('api/getFilmsData.php').success(function (data) {
      $scope.films = data;
      // $scope.films.map(function (row) {
      //   row.profitability = parseFloat(row.profitability).toFixed(1);
      //   return row;
      // });
      
      if($scope.openFilm) {
        const toggle = document.querySelector('#film-details-'+$scope.openFilm);
        toggle.classList.toggle('hide');
      }
    });
  };

  $scope.addComment = function(filmID, commenter, comment) {
    if(!filmID || !commenter || !comment)
      return;

    $http.post('api/addComment.php?filmID='+filmID+'&commenter='+commenter+'&comment='+comment).success(function (data) {
      getFilmsData();
      $scope.openFilm = filmID;
    })
  }

  $scope.showDetails = function(filmID) {
    const toggle = document.querySelector('#film-details-'+filmID);
    toggle.classList.toggle('hide');
  };
});
