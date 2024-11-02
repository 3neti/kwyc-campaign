<?php

namespace App\Hyperverge\Enums;

enum Extracted: string
{
    case ID_TYPE = 'idType';
    case ID_NUMBER = 'idNumber';
    case FIRST_NAME = 'firstName';
    case MIDDLE_NAME = 'middleName';
    case LAST_NAME = 'lastName';
    case FULL_NAME = 'fullName';
    case DATE_OF_BIRTH = 'dateOfBirth';
    case DATE_OF_ISSUE = 'dateOfIssue';
    case DATE_OF_EXPIRY = 'dateOfExpiry';
    case COUNTRY_CODE = 'countryCode';
    case TYPE = 'type';
    case ADDRESS = 'address';
    case GENDER = 'gender';
    case PLACE_OF_BIRTH = 'placeOfBirth';
    case PLACE_OF_ISSUE = 'placeOfIssue';
    case YEAR_OF_BIRTH = 'yearOfBirth';
    case AGE = 'age';
    case FATHER_NAME = 'fatherName';
    case MOTHER_NAME = 'motherName';
    case HUSBAND_NAME = 'husbandName';
    case SPOUSE_NAME = 'spouseName';
    case NATIONALITY = 'nationality';
    case MRZ_STRING = 'mrzString';
    case HOME_TOWN = 'homeTown';

    public function index(): string
    {
        return match ($this) {
            Extracted::ID_TYPE => 'idType',
            Extracted::ID_NUMBER => 'fieldsExtracted.idNumber.value',
            Extracted::FIRST_NAME => 'fieldsExtracted.firstName.value',
            Extracted::MIDDLE_NAME => 'fieldsExtracted.middleName.value',
            Extracted::LAST_NAME => 'fieldsExtracted.lastName.value',
            Extracted::FULL_NAME => 'fieldsExtracted.fullName.value',
            Extracted::DATE_OF_BIRTH => 'fieldsExtracted.dateOfBirth.value',
            Extracted::DATE_OF_ISSUE => 'fieldsExtracted.dateOfIssue.value',
            Extracted::DATE_OF_EXPIRY => 'fieldsExtracted.dateOfExpiry.value',
            Extracted::COUNTRY_CODE => 'fieldsExtracted.countryCode.value',
            Extracted::TYPE => 'fieldsExtracted.type.value',
            Extracted::ADDRESS => 'fieldsExtracted.address.value',
            Extracted::GENDER => 'fieldsExtracted.gender.value',
            Extracted::PLACE_OF_BIRTH => 'fieldsExtracted.placeOfBirth.value',
            Extracted::PLACE_OF_ISSUE => 'fieldsExtracted.placeOfIssue.value',
            Extracted::YEAR_OF_BIRTH => 'fieldsExtracted.yearOfBirth.value',
            Extracted::AGE => 'fieldsExtracted.age.value',
            Extracted::FATHER_NAME => 'fieldsExtracted.fatherName.value',
            Extracted::MOTHER_NAME => 'fieldsExtracted.motherName.value',
            Extracted::HUSBAND_NAME => 'fieldsExtracted.husbandName.value',
            Extracted::SPOUSE_NAME => 'fieldsExtracted.spouseName.value',
            Extracted::NATIONALITY => 'fieldsExtracted.nationality.value',
            Extracted::MRZ_STRING => 'fieldsExtracted.mrzString.value',
            Extracted::HOME_TOWN => 'fieldsExtracted.homeTown.value',
        };
    }
}
