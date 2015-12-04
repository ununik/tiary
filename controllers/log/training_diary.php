<?php
$trainingClass = new Training();
$allSports = $trainingClass->getAllTrainingSport();
$newTraining = include_once 'views/training_diary/new_training.php';
$actualWeek = include_once 'views/training_diary/actual_week.php';
return include_once 'views/training_diary/diary_index-html.php';