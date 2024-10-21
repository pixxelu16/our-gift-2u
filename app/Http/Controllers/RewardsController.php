<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RewardsController extends Controller
{
    //function for debit cards rewards welcome
    public function debit_cards_rewards_welcome(){
        return view('rewards.debit-cards-rewards-welcome');
    }

    //function for soccer perks pro welcome page
    public function soccer_perks_pro_welcome(){
        return view('rewards.soccer-perks-pro-welcome');
    }
    //function for aussie rules welcome page
    public function aussie_rules_welcome(){
        return view('rewards.aussie-rules-welcome');
    }
    //function for in2sports rewards welcome page
    public function in2sports_rewards_welcome(){
        return view('rewards.in2sports-rewards-welcome');
    }
}