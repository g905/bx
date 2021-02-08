<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class Scores extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $result = array(
            "X" => intval($arParams["X"]),
        );
        return $result;
    }
    
    public function getScoresByUser($userId = null) {
        $filter = [];
        if ($userId) {
            $filter = ['USER_ID' => $userId];
        }
        $disc = \Test\ResultTable::getList([
            'select' => ['*', 'USER', 'DISCIPLINE'],
            'filter' => $filter,
            'limit' => 10
        ]);
        $res = [];
        while($r = $disc->fetchObject()) {
            $res[] = $r;
        }
        return $res;
    }
    
    public function getAllScores($sort = array()) {
        $disc = \Test\ResultTable::getList([
            'select' => ['*', 'USER', 'DISCIPLINE'],
            'order' => $sort
        ]);
        $res = [];
        while($r = $disc->fetchObject()) {
            $res[] = $r;
        }
        return $res;
    }
    
    public function getScoresByUserAndDiscipline($userId = null, $disciplineId = null) {
        $filter = [];
        if ($userId) {
            $filter['USER_ID'] = $userId;
        }
        if ($disciplineId) {
            $filter['DISCIPLINE_ID'] = $disciplineId;
        }
        $disc = \Test\ResultTable::getList([
            'select' => ['*', 'USER', 'DISCIPLINE'],
            'filter' => $filter,
            'limit' => 10
        ]);
        $res = [];
        while($r = $disc->fetchObject()) {
            $res[] = $r;
        }
        return $res;
    }
    
    public function getUserNameById($userId = null) {
        if (!$userId) {
            throw new Exception("не указан user id");
        }
        $user = \Test\UserTable::getList([
            'select' => ['*'],
            'filter' => ['ID' => $userId]
        ])->fetchObject();
        
        return $user->getName();
    }
    
    public function getDisciplines($discId = null) {
        $filter = [];
        if ($discId) {
            $filter = ['ID' => $discId];
        }
        $discs = \Test\DisciplineTable::getList([
            'select' => ['*'],
            'filter' => $filter
        ]);
        
        $res = [];
        while($r = $discs->fetchObject()) {
            $res[] = $r;
        }
        return $res;
    }
    
    public function getDisciplineById($discId = null) {
        $filter = [];
        if ($discId) {
            $filter = ['ID' => $discId];
        }
        $discs = \Test\DisciplineTable::getList([
            'select' => ['*'],
            'filter' => $filter
        ])->fetchObject();
        return $discs;
    }
    
    public function getUsers() {
        $users = \Test\UserTable::getList([
            'select' => ['*']
        ]);
        $res = [];
        while($r = $users->fetchObject()) {
            $res[] = $r;
        }
        return $res;
    }
    public function getUserById($userId = null) {
        $filter = [];
        if ($userId) {
            $filter['ID'] = $userId;
        }
        $user = \Test\UserTable::getList([
            'select' => ['*'],
            'filter' => $filter
        ])->fetchObject();
        return $user;
    }
} 
