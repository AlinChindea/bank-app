<?php

namespace App\Http\Enums;

enum AccountName: string
{
    case BROKERAGE = 'brokerage';
    case CERTIFICATEOFDEPOSIT = 'certificate_of_deposit';
    case CHECKING = 'checking';
    case CREDITCARD = 'credit_card';
    case INVESTMENT = 'investment';
    case LOAN = 'loan';
    case MORTGAGE = 'mortgage';
    case PENSION = 'pension';
    case SAVINGS = 'savings';
}
