<?php

if (!function_exists('mockJsonResponseRetrieveResult')) {
    function mockJsonResponseRetrieveResult(string $transactionId): string
    {
        return <<<EOT
{
    "status": "success",
    "statusCode": 200,
    "metadata": {
        "requestId": "1677241068652-29eebd5e-61bd-4b8b-bd1b-b748474737a0",
        "transactionId": "$transactionId"
    },
    "result": {
        "workflowDetails": {
            "workflowId": "default",
            "version": 1
        },
        "applicationStatus": "auto_approved",
        "results": [
            {
                "module": "undefined front",
                "countrySelected": "phl",
                "documentSelected": "dl",
                "attempts": "3",
                "expectedDocumentSide": "front",
                "moduleId": "module_id",
                "croppedImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-02-24/12dqkm/1677231240564-10588323-852f-4bce-b35c-acb6e9cb080a/cropped.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121749Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=09b0c69cb3d08c4ae156c13cbf022eb8613ec33a047a38be7580a91bf2abf807&X-Amz-SignedHeaders=host",
                "imageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-02-24/12dqkm/1677231240564-10588323-852f-4bce-b35c-acb6e9cb080a/image.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121749Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=3f814508f4a6b6139bbaf2edfd0fa23346edcf675bccaf1160339bd6e4c64a1b&X-Amz-SignedHeaders=host",
                "apiResponse": {
                    "status": "success",
                    "statusCode": 200,
                    "metadata": {
                        "requestId": "1677231240564-10588323-852f-4bce-b35c-acb6e9cb080a",
                        "transactionId": "$transactionId"
                    },
                    "result": {
                        "details": [
                            {
                                "idType": "phl_dl",
                                "fieldsExtracted": {
                                    "firstName": {
                                        "value": ""
                                    },
                                    "middleName": {
                                        "value": ""
                                    },
                                    "lastName": {
                                        "value": ""
                                    },
                                    "fullName": {
                                        "value": "HURTADO, LESTER BIADORA"
                                    },
                                    "dateOfBirth": {
                                        "value": "21-04-1970"
                                    },
                                    "dateOfIssue": {
                                        "value": ""
                                    },
                                    "dateOfExpiry": {
                                        "value": "21-04-2027"
                                    },
                                    "countryCode": {
                                        "value": ""
                                    },
                                    "type": {
                                        "value": ""
                                    },
                                    "address": {
                                        "value": "8 WEST MAYA DRIVE PHILAM HOMES QUEZON CITY",
                                        "houseNumber": "",
                                        "province": "",
                                        "street": "",
                                        "district": "",
                                        "zipCode": "",
                                        "additionalInfo": ""
                                    },
                                    "gender": {
                                        "value": "M"
                                    },
                                    "idNumber": {
                                        "value": "N01-87-049586"
                                    },
                                    "placeOfBirth": {
                                        "value": ""
                                    },
                                    "placeOfIssue": {
                                        "value": ""
                                    },
                                    "yearOfBirth": {
                                        "value": "1970"
                                    },
                                    "age": {
                                        "value": ""
                                    },
                                    "fatherName": {
                                        "value": ""
                                    },
                                    "motherName": {
                                        "value": ""
                                    },
                                    "husbandName": {
                                        "value": ""
                                    },
                                    "spouseName": {
                                        "value": ""
                                    },
                                    "nationality": {
                                        "value": "PHL"
                                    },
                                    "mrzString": {
                                        "value": "",
                                        "idNumber": "",
                                        "fullName": "",
                                        "dateOfBirth": "",
                                        "dateOfExpiry": "",
                                        "gender": "",
                                        "nationality": ""
                                    },
                                    "homeTown": {
                                        "value": ""
                                    }
                                },
                                "croppedImageUrl": "https://sg-kyc-hyperverge-co.s3.ap-southeast-1.amazonaws.com/undefined/2023-02-24/6ad9ef/1677231240838-6bfae7f4-dc82-477c-9489-668ca0b6ab7de377648d-999d-4a49-aef2-4b907e089e0a-ycOqAUcpjB_phl_dl_1.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAXB3KY4F5HQFS6SM7%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T093401Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGYaDmFwLXNvdXRoZWFzdC0xIkcwRQIhAIzh9a0bfnjHmcp%2BrIvs53ClDj1%2BaGnVu73XhCKrk%2B5IAiBoP6EZqieXW%2Fj9DT%2BJ5eJi3Nq0bKOL9urSGUkkh5PXayrkBAj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAAaDDQ4NTAxODM2MjIzNCIMv6vYdt8mRSgtCLGxKrgEAMXnEQYFKTtTNZcqUR6%2Bph5M2KBTSfX0wIczAoaVgGG8aefidh%2B71RHNb%2FemeqNl1XtxeFtTB%2BQAT3BV2XEnVow4J6TF16VPjGYCu9jeZsMinddYefJwaMdVVqdvEOHQgDkMCG5XB5PVyUbz3FHlMNNaW5Hj1g0%2F%2FNLOO1jzLP7TRAtaYpJUEgCbAD5tqA3BVtqkekznzd10K9O7IOt94DbXiEJYFhdLP9F%2FOiO8%2FNR5LPPzrOPEnIFQUbw53gVBd0BvaT7DdGng3Ak6%2BxlhfwDO%2BmEe5yeUms9oeR55I2cCAXH2sZXPuM9kiQ%2FiDAQerqNyXCxfIMXGsZUV2pOeH3b15AZNSjzVOAFviF1lj4LWtF77zrQches%2B9HWd9Ro1%2FCRT1Mk0W3c9vcYZwHNcXV4yq6cKniwprXJmETpXDaIFpNZ2XYm1Z2Rz%2FVzlNSoBLwzVioFTxbMpOGmm4VUhE%2Ffdk9GhAoZzZJJY1GIgGWiMm43VFxeB%2BYskWSEbcPAgR7eh9PJSiK6xlyPSo%2FNt1pBcmZTk%2FwDfseRahJoxGEw1l1vI6GXT8mR2V1dv9FPPiwIA%2BcVdR%2BgqaT7zfOn2S%2B%2FCiZ03VGItHMbUm2ZmJCZbS9EuIS%2B1qRyoBg02N3RdUOuzMasOfJQLK7HDUoWNBHfwGKwjASqdWKMCpAekZHYh0HYyev6c5apAQIIK01V%2F2%2BzPLZ7J4TLMkfGWSu20uwyTvJ30vyZ%2BUuIu3nT6O3f6Bcy5zYxpjDCyqeGfBjqpAYkxI%2F0Ad8YB2JyxmmpL3dIZD%2FQBS1wa2QhCt074fN8TFPUE%2B%2FwIQcMqqCgQpbRfgzPkZN1ahjachvwMqY2cPzaY%2B%2BNYymxafbQV5Z4x0oT1Pqme1DyPMDhHKWZdqpkaCvMtCVRHre7TyePUM%2FrJnG3wsyb3G7Zf0MQIwgqGAOEjSCqAzmZkLjkRKSve3s6QZSxzX6WgCQFaLbvpTeGEcR37srq70J%2FQqME%3D&X-Amz-Signature=6fadb1b6ab1836fee614a890500a4dbbe9d3a56dda96605ca42f4792b8834d5b&X-Amz-SignedHeaders=host",
                                "qualityChecks": {
                                    "blur": {
                                        "value": "no"
                                    },
                                    "glare": {
                                        "value": "no"
                                    },
                                    "blackAndWhite": {
                                        "value": "no"
                                    },
                                    "capturedFromScreen": {
                                        "value": "no"
                                    },
                                    "partialId": {
                                        "value": "no"
                                    }
                                }
                            }
                        ],
                        "summary": {
                            "action": "pass",
                            "details": []
                        }
                    }
                },
                "previousAttempts": [
                    {
                        "module": "undefined front",
                        "countrySelected": "phl",
                        "documentSelected": "dl",
                        "attempts": "1",
                        "expectedDocumentSide": "front",
                        "moduleId": "module_id",
                        "croppedImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-02-24/12dqkm/1677231199552-db6e8191-fadd-45da-9f3d-8509dbb20b80/cropped.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121749Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=85562e097db85cec8f139c3ecce30fa8ee95d782eca24002608d44ea242202ba&X-Amz-SignedHeaders=host",
                        "imageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-02-24/12dqkm/1677231199552-db6e8191-fadd-45da-9f3d-8509dbb20b80/image.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121749Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=fc5f9d497c7569a0ff52a6c42f5a7182f4a4a9b59932f0f80af6e0dfd22cc933&X-Amz-SignedHeaders=host",
                        "apiResponse": {
                            "status": "success",
                            "statusCode": 200,
                            "metadata": {
                                "requestId": "1677231199552-db6e8191-fadd-45da-9f3d-8509dbb20b80",
                                "transactionId": "$transactionId"
                            },
                            "result": {
                                "details": [
                                    {
                                        "idType": "phl_dl",
                                        "fieldsExtracted": {
                                            "firstName": {
                                                "value": ""
                                            },
                                            "middleName": {
                                                "value": ""
                                            },
                                            "lastName": {
                                                "value": ""
                                            },
                                            "fullName": {
                                                "value": "HURTADO, LESTER BIADORA"
                                            },
                                            "dateOfBirth": {
                                                "value": "21-04-1970"
                                            },
                                            "dateOfIssue": {
                                                "value": ""
                                            },
                                            "dateOfExpiry": {
                                                "value": "21-04-2027"
                                            },
                                            "countryCode": {
                                                "value": ""
                                            },
                                            "type": {
                                                "value": ""
                                            },
                                            "address": {
                                                "value": "8 WEST MAYA DRIVE PHILAM HOMES QUEZON CITY",
                                                "houseNumber": "",
                                                "province": "",
                                                "street": "",
                                                "district": "",
                                                "zipCode": "",
                                                "additionalInfo": ""
                                            },
                                            "gender": {
                                                "value": ""
                                            },
                                            "idNumber": {
                                                "value": "N01-87-049586"
                                            },
                                            "placeOfBirth": {
                                                "value": ""
                                            },
                                            "placeOfIssue": {
                                                "value": ""
                                            },
                                            "yearOfBirth": {
                                                "value": "1970"
                                            },
                                            "age": {
                                                "value": ""
                                            },
                                            "fatherName": {
                                                "value": ""
                                            },
                                            "motherName": {
                                                "value": ""
                                            },
                                            "husbandName": {
                                                "value": ""
                                            },
                                            "spouseName": {
                                                "value": ""
                                            },
                                            "nationality": {
                                                "value": "PHL"
                                            },
                                            "mrzString": {
                                                "value": "",
                                                "idNumber": "",
                                                "fullName": "",
                                                "dateOfBirth": "",
                                                "dateOfExpiry": "",
                                                "gender": "",
                                                "nationality": ""
                                            },
                                            "homeTown": {
                                                "value": ""
                                            }
                                        },
                                        "croppedImageUrl": "https://sg-kyc-hyperverge-co.s3.ap-southeast-1.amazonaws.com/undefined/2023-02-24/6ad9ef/1677231200660-995d5c50-22f4-4a47-8294-06edf6a8a3c9485c32f2-04f2-480e-9eb5-7442af3c0238-4GeapMRIGR_phl_dl_1.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAXB3KY4F5L63MK6WY%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T093321Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGcaDmFwLXNvdXRoZWFzdC0xIkcwRQIgYEcaqZRAxznRkiAibYBEOAG0Br6Z%2B2k4K%2F4EDOuSLw8CIQC3mpKo9vVb%2BpaRQzlVPfTDhHQ4%2BuCIXW7k1Oh2LCBY%2BCrbBAgQEAAaDDQ4NTAxODM2MjIzNCIMt3p3QKWnCzeCxcooKrgEfbKnFmInojz3HLz6eNE%2BFO9gQVdgUcTyDqvDFnZMzNd24V0aAdX9ioJp5s8MTmsfuZA8TW9wWMHBTAYvnD3RUqfVcAF9JaGu7uVnqPisZUGjg%2BWnuGE0Z8CcZr6aUUOeo3nQHe6d5L41gXt6ozDdcltdgh54ihNPm4YeA%2F3rxTQJ2VFzRENXvxKG%2FG4uiKQW%2FlPtoqOGTrf%2FoyZD9oBnoYLd2sRzHt2530Xez37DVHtJOyhRcRd2cKIh47GU46CZVxuvxYYdeewjwJRD%2B1AflUGE4wZ5Pm0euG%2FMyhHA0tXK8ThEfeL6TaJ4zaHd6kgXLlIbARaJvIDCjXZmMv3c6GQ3T%2Fp1iayVWtM7YW0XhMZhmDSbVwiTVFGk3Gntaj%2B3AgjPS0AngzvjY2Rhpuui6yl2%2FvwhH02GVZeDB6oTQgGhxjuF8MmVYjgNr0iDiVbuCIXHI1WNbxdR9DpviiqGUeb0YSMVQvJoJ0ukA%2FYAzcFcEBeesBlSo95ykW5Bob2D5LKOAslTQsGAixdE%2FQDzsL9wS8AALbc%2Fq23HJkpb105wrS%2B8z76MB2Pax2xlgvtkZUgJOtNU85fnpLwm7ZJlUzczkR0WVSZ6jFK%2FKzJTckzMOGh7%2BrDqL8vqunghPliAtetV6y1eB4tpD%2BafooVy25pWLAd%2FVmKCunoRsC9Fa8%2Bg3Dz2cnsjhOKxr5l2XdZYl7Rl7grvjUBnQq30lIqCbYpbDOr%2FIGF5LAXu0tpDESe619R5MK8cMDDZsuGfBjqpAeyDEEEcB2aNIPmRMsJC9v56teWkKnyhiapVWPguJKGiSIMG57Sj6e4bG7mO%2FKozroeG6hhXUfhdzbWAHN92a7XIoyvG%2FEwMqX5PP8LSxZZ%2FonCeHISMBUvFkla29d8X7C%2B0%2B8b90EOfqzrtnbEQddg2%2FkAWQBPHf0qghMBrCJGYnoKkrr0QoMZBmspJigDBRB2P0nZr9wRRIzWcnZLXjIbT7hmMNtFv0Es%3D&X-Amz-Signature=1dac3a8e502fe57f8316df3328cb695e15ce6d6aa80be6868c6e3a8205d50191&X-Amz-SignedHeaders=host",
                                        "qualityChecks": {
                                            "blur": {
                                                "value": "yes"
                                            },
                                            "glare": {
                                                "value": "no"
                                            },
                                            "blackAndWhite": {
                                                "value": "no"
                                            },
                                            "capturedFromScreen": {
                                                "value": "no"
                                            },
                                            "partialId": {
                                                "value": "no"
                                            }
                                        }
                                    }
                                ],
                                "summary": {
                                    "action": "retake",
                                    "details": [
                                        {
                                            "code": "127",
                                            "message": "Document blurred"
                                        }
                                    ],
                                    "retakeMessage": "Document blurred"
                                }
                            }
                        }
                    },
                    {
                        "module": "undefined front",
                        "countrySelected": "phl",
                        "documentSelected": "dl",
                        "attempts": "2",
                        "expectedDocumentSide": "front",
                        "moduleId": "module_id",
                        "croppedImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-02-24/12dqkm/1677231216715-f9183f16-d26c-492c-84b8-d89a19025c31/cropped.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121750Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=dc26b51a73c64fe249d42e68e32420e84c4d7c46aa3918ae1aa49eea33154272&X-Amz-SignedHeaders=host",
                        "imageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-02-24/12dqkm/1677231216715-f9183f16-d26c-492c-84b8-d89a19025c31/image.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121750Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=24ffce894066f7e83efe16328c3fff93fbde0aabae8e2a878707db2c13bfcf7a&X-Amz-SignedHeaders=host",
                        "apiResponse": {
                            "status": "success",
                            "statusCode": 200,
                            "metadata": {
                                "requestId": "1677231216715-f9183f16-d26c-492c-84b8-d89a19025c31",
                                "transactionId": "$transactionId"
                            },
                            "result": {
                                "details": [
                                    {
                                        "idType": "phl_dl",
                                        "fieldsExtracted": {
                                            "firstName": {
                                                "value": ""
                                            },
                                            "middleName": {
                                                "value": ""
                                            },
                                            "lastName": {
                                                "value": ""
                                            },
                                            "fullName": {
                                                "value": "HURTADO, LESTER BIADORA"
                                            },
                                            "dateOfBirth": {
                                                "value": "21-04-1970"
                                            },
                                            "dateOfIssue": {
                                                "value": ""
                                            },
                                            "dateOfExpiry": {
                                                "value": "21-04-2027"
                                            },
                                            "countryCode": {
                                                "value": ""
                                            },
                                            "type": {
                                                "value": ""
                                            },
                                            "address": {
                                                "value": "8 WEST MAYA DENE PHILAM HOMES QUEZON CITY",
                                                "houseNumber": "",
                                                "province": "",
                                                "street": "",
                                                "district": "",
                                                "zipCode": "",
                                                "additionalInfo": ""
                                            },
                                            "gender": {
                                                "value": ""
                                            },
                                            "idNumber": {
                                                "value": "N01-87-049586"
                                            },
                                            "placeOfBirth": {
                                                "value": ""
                                            },
                                            "placeOfIssue": {
                                                "value": ""
                                            },
                                            "yearOfBirth": {
                                                "value": "1970"
                                            },
                                            "age": {
                                                "value": ""
                                            },
                                            "fatherName": {
                                                "value": ""
                                            },
                                            "motherName": {
                                                "value": ""
                                            },
                                            "husbandName": {
                                                "value": ""
                                            },
                                            "spouseName": {
                                                "value": ""
                                            },
                                            "nationality": {
                                                "value": "PHL"
                                            },
                                            "mrzString": {
                                                "value": "",
                                                "idNumber": "",
                                                "fullName": "",
                                                "dateOfBirth": "",
                                                "dateOfExpiry": "",
                                                "gender": "",
                                                "nationality": ""
                                            },
                                            "homeTown": {
                                                "value": ""
                                            }
                                        },
                                        "croppedImageUrl": "https://sg-kyc-hyperverge-co.s3.ap-southeast-1.amazonaws.com/undefined/2023-02-24/6ad9ef/1677231217741-fbbb917b-a3bc-460f-8176-4d78345e612195109920-7a5b-48bf-9ea3-7c75b166fbfc-olPSISZ4bp_phl_dl_1.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAXB3KY4F5HQFS6SM7%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T093338Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGYaDmFwLXNvdXRoZWFzdC0xIkcwRQIhAIzh9a0bfnjHmcp%2BrIvs53ClDj1%2BaGnVu73XhCKrk%2B5IAiBoP6EZqieXW%2Fj9DT%2BJ5eJi3Nq0bKOL9urSGUkkh5PXayrkBAj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAAaDDQ4NTAxODM2MjIzNCIMv6vYdt8mRSgtCLGxKrgEAMXnEQYFKTtTNZcqUR6%2Bph5M2KBTSfX0wIczAoaVgGG8aefidh%2B71RHNb%2FemeqNl1XtxeFtTB%2BQAT3BV2XEnVow4J6TF16VPjGYCu9jeZsMinddYefJwaMdVVqdvEOHQgDkMCG5XB5PVyUbz3FHlMNNaW5Hj1g0%2F%2FNLOO1jzLP7TRAtaYpJUEgCbAD5tqA3BVtqkekznzd10K9O7IOt94DbXiEJYFhdLP9F%2FOiO8%2FNR5LPPzrOPEnIFQUbw53gVBd0BvaT7DdGng3Ak6%2BxlhfwDO%2BmEe5yeUms9oeR55I2cCAXH2sZXPuM9kiQ%2FiDAQerqNyXCxfIMXGsZUV2pOeH3b15AZNSjzVOAFviF1lj4LWtF77zrQches%2B9HWd9Ro1%2FCRT1Mk0W3c9vcYZwHNcXV4yq6cKniwprXJmETpXDaIFpNZ2XYm1Z2Rz%2FVzlNSoBLwzVioFTxbMpOGmm4VUhE%2Ffdk9GhAoZzZJJY1GIgGWiMm43VFxeB%2BYskWSEbcPAgR7eh9PJSiK6xlyPSo%2FNt1pBcmZTk%2FwDfseRahJoxGEw1l1vI6GXT8mR2V1dv9FPPiwIA%2BcVdR%2BgqaT7zfOn2S%2B%2FCiZ03VGItHMbUm2ZmJCZbS9EuIS%2B1qRyoBg02N3RdUOuzMasOfJQLK7HDUoWNBHfwGKwjASqdWKMCpAekZHYh0HYyev6c5apAQIIK01V%2F2%2BzPLZ7J4TLMkfGWSu20uwyTvJ30vyZ%2BUuIu3nT6O3f6Bcy5zYxpjDCyqeGfBjqpAYkxI%2F0Ad8YB2JyxmmpL3dIZD%2FQBS1wa2QhCt074fN8TFPUE%2B%2FwIQcMqqCgQpbRfgzPkZN1ahjachvwMqY2cPzaY%2B%2BNYymxafbQV5Z4x0oT1Pqme1DyPMDhHKWZdqpkaCvMtCVRHre7TyePUM%2FrJnG3wsyb3G7Zf0MQIwgqGAOEjSCqAzmZkLjkRKSve3s6QZSxzX6WgCQFaLbvpTeGEcR37srq70J%2FQqME%3D&X-Amz-Signature=d8ce8796d13b52b6168414c0037d716109732b82ffc664f0028cf622d3c652fa&X-Amz-SignedHeaders=host",
                                        "qualityChecks": {
                                            "blur": {
                                                "value": "yes"
                                            },
                                            "glare": {
                                                "value": "no"
                                            },
                                            "blackAndWhite": {
                                                "value": "no"
                                            },
                                            "capturedFromScreen": {
                                                "value": "no"
                                            },
                                            "partialId": {
                                                "value": "no"
                                            }
                                        }
                                    }
                                ],
                                "summary": {
                                    "action": "retake",
                                    "details": [
                                        {
                                            "code": "127",
                                            "message": "Document blurred"
                                        }
                                    ],
                                    "retakeMessage": "Document blurred"
                                }
                            }
                        }
                    }
                ]
            },
            {
                "attempts": "1",
                "moduleId": "module_selfie",
                "imageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/checkLiveness/2023-02-24/12dqkm/1677231252911-e30a99cf-c625-44bf-aa3a-c6a67b42b4e0/image.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRZ3IN3VWS%2F20230224%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230224T121749Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGwaCmFwLXNvdXRoLTEiRjBEAiAU9QkLu6LeGVALccMsO5LeSqgnGH1UWJpgvQSty8uyPwIgAklKiz0%2F8Sij2YvWNFTAMMorMl7ssS87AYZLwHyJeAcqvwUIFRABGgw2NTU2NzY1MjUzNDciDM3VbaaaWD8Xi%2FKTXiqcBePfcoo%2FmE33G5Y9Tyk1mqcJfEa1Ufgt9bi%2FKPGKqebTgdyMrG6bGZGn%2BcB2xyZkztmUJ%2ByzZeaBG9stEZKwuEZFyQxXw6kF2iSIkWZq3%2F7ZThb9FDhMP0DjYMEdimfQO45BSbsJAZ%2BTEV1lttF1qOOUrXSOs5W%2BCJhW06RgeiPh6xzCoDv236MAswmsEE%2BWzc6ca28Eeu9d71Mas0P%2FJti0pktsd%2BZbIG0PRkfrOGyaS3EXRbZV4Ju5JOAhyq%2FaMoPPPSi35XIOiRGCOyo7y2TX1y6Qra%2BAmVFlFGqNrXBbU6w0Iht%2F%2B5PfYJsrCxMCSCNZuqCwLuGU5J7EN1u5FRyYipNWo%2FujTLeeuX4r1xWyx2iIz1ZrKVMOT5%2B%2Fkmjl7Rgtzf1DluF4OMmwn942m%2BNS8niMahYODiA2%2FuC9b1DlIJ7bSk4XzavkkxtbhTNOXOs5q2dm%2Bl92ZFb9oNxJClV1bXh36ML8XKMbJH7CI62bnm4O5PPMVfKiHPrsGrbSmNylHAc2lgWuMaMAN1hsePBp%2Fv%2FFe8drrYs5Nskvn1RuDFEN76xW59kXKikz2%2FtFD5UkPZrBJ2F2qYCaD6FjjRpL4VNoObfMygtYBvqCdPH8JZSa3fAWlYp%2FngnGBAYbjdPV0Y6oYOqd5sHrf8z0qW9aFAYgkwWoEH%2B6ExkdW0IQ5QHr1w%2FB8D2gIcg2AuyFRBtkV5Dq0spy6R8nt%2FTKneq8RxONnEK6EuxkhbPqMz3yka2lN%2F3E2r3gkSWE33nobIRR0dZNVK8g1o2AdWKDR8KBr%2FOqANI0ITQV306bYZAvJwctyZcxxRfvcQuuPQi0KJs9cA3%2Bfw55zX5jX4cbz6u9c3FLK35BHR2Qh%2B%2B68BOCSbVXXZWfn9D5dbdFMNzM4p8GOrIBaFnGHF3wAAOAQ8K6ZRHvQ6%2FQysVnYZlQihROYF%2FWDWPOUrPbUGij%2FT1zb%2F1L42ifBOWTdcJYhSDxXX%2FKAtOiyl3%2B1zlYKVyjwe84g81wcBF8q7ancEX7XUtnVGqCRgdWlkwcq6wqX%2FY6GGLNtH3QfNOmpTmZ456Gf7Wa%2Ffu4enLNEGOgD2TzODD9J8AjS94o9xTvkP%2FCqZKgikDO3NvRxnULHfTeiF%2Fo7ukCFIgfr3twsA%3D%3D&X-Amz-Signature=03315d37381d07de45e4e70d1d8a9ac8c42fec7ae924e216297eb1514a77b987&X-Amz-SignedHeaders=host",
                "apiResponse": {
                    "status": "success",
                    "statusCode": 200,
                    "metadata": {
                        "requestId": "1677231252911-e30a99cf-c625-44bf-aa3a-c6a67b42b4e0",
                        "transactionId": "$transactionId"
                    },
                    "result": {
                        "details": {
                            "liveFace": {
                                "value": "yes",
                                "confidence": "high"
                            },
                            "qualityChecks": {
                                "blur": {
                                    "value": "no",
                                    "confidence": "high"
                                },
                                "eyesClosed": {
                                    "value": "no",
                                    "confidence": "high"
                                },
                                "maskPresent": {
                                    "value": "no",
                                    "confidence": "high"
                                },
                                "multipleFaces": {
                                    "value": "no",
                                    "confidence": "high"
                                }
                            }
                        },
                        "summary": {
                            "action": "pass",
                            "details": []
                        }
                    }
                },
                "previousAttempts": []
            },
            {
                "moduleId": "module_facematch",
                "idImageUrl": "https://jn-img.enclaves.ph/Test/idImage.jpg",
                "selfieImageUrl": "https://jn-img.enclaves.ph/Test/selfieImage.jpg",
                "apiResponse": {
                    "status": "success",
                    "statusCode": 200,
                    "metadata": {
                        "requestId": "1677231255988-c8601149-b518-4fa7-89b6-33f3b1eade04",
                        "transactionId": "$transactionId"
                    },
                    "result": {
                        "details": {
                            "match": {
                                "value": "yes",
                                "confidence": "high"
                            }
                        },
                        "summary": {
                            "action": "pass",
                            "details": []
                        }
                    }
                },
                "attempts": "1",
                "previousAttempts": []
            }
        ]
    }
}
EOT;
    }
}

if (!function_exists('mockJsonResponseRetrieveResult2')) {
    function mockJsonResponseRetrieveResult2(string $transactionId): string
    {
        return <<<EOT
{
    "result": {
        "results": [
            {
                "module": "undefined front",
                "attempts": "1",
                "imageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-09-29/hgqa2f/1695959601972-2ff5f025-0d87-4b65-84a0-6d5dc34bdd0e/image.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRQ5EG32MA%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035342Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCmFwLXNvdXRoLTEiSDBGAiEAnxRZWppYtTxAR0lSRBw8O8BsNuJSf%2FixC4lIlHgyCJoCIQCoYZYhZcmmoa6I9QzLjzl9BZ%2FKe1BO%2FHLJ4%2BVgh5bqUyrHBQiy%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMMgagAxRALyfVZI5GKpsFXCrv5p39YJn818JWn%2FQKJpy4%2F%2FMBgXSHx9d2cCEnKOKUIZOo3hl54duCu3Ilobhh0QUm0d%2Fulo3OPx%2FEiYTZXIsMAGzJvtoG4Lk2rWVDZNCeU3qXuTu7%2BIL5O4bLakmul1n9ozz9KQzgoh7qncpWzXzVkEKUDMuHrRUoIP444mNyWLKrMsq%2BI9GQMBoQeMX4QUif4Jz72esYhS8olbsBhSBbDI45MKyM9z20vP6iQa2ppvRfAGNCHmay5zhWedkkVR80kPf8UJOJhypib2VjkOrYSDs%2BqI2Cj222QoSK8dRHhSJTPmaU7u64CWZIthTVbpu8YzvHvQ54F9TUrPbnm9JRDndFfecACsh15tIPKh1X2LO5KJHxgOJaj8G3Aikb%2BXrxXEeHTkgZezbHDOi40FF3DLyvWcmUdyfh26r4EB5A%2Bi9eVyway4QeD%2BQsfnDmTVS9gbndkzuwqMi12iZJaKWwhYek8K7CZxfQ2ERildgwuhxXGaFcbGjqjAXLCCpWwEMt15xXn%2FRTX8rnaNAJj0%2FlOsqv67RxmK8egmvkLvRYVZcoZTU70vKe0auQKjFt75zroVNsCgWC5JJFUDhALs1lQOkS1If1%2BfdFHY1S8fxF1t93GO%2FHi5a9%2B%2F0sWhQh%2BC8icze1z18rjIwr7h4YkgD8aA53cvJOtCLIh3bEHX3FLQWNU5kO1wEncv%2BqUpJk2W0CG16uU8D00%2FZ2lzIzE%2FLxkhCNNfABbrcpO9f%2Bo1M%2FUO8puTPQ3wV79HqVpxgZCIN7yQSdkNDCcJUYjLlyCMZr5KEt%2BFbHOrTvZLoB%2BnIfe4D2lWv7YBzGIFm8NrSgXRr9pt8mQiToWHA0ep411osre3fgiiy3ed5nvOCiZcqcrfuM7J5%2B7FwMLDCiw9ioBjqwAXXOFqDBCHyurI0ZxLp7MbDL3yjoztdqgXBSiQkkPKti%2Be5qhgDppVKvAPWKMBAEAiMOSgHriNcdsgsgw4kr7k1RLFz%2FLagoUKxI8vwNSc%2BbEjpCnK%2BRjyYULg4T%2FCMaR17t3aiq9hqPnkuRLR088RNOzq3JqOzvHFbJN8ZPb%2BWMrY5lKuLw3ubaZYBREKEB5zKjHY5n6gEvNC6xGMHL1xkuyrJRzJwKQaUthJo7ZXRa&X-Amz-Signature=a2be658f0361d7aaa026978f62b2ff18b396ddb7b12f6b4e59cf06e467ff4478&X-Amz-SignedHeaders=host",
                "moduleId": "module_id_card_validation",
                "apiResponse": {
                    "result": {
                        "details": [
                            {
                                "idType": "phl_dl",
                                "croppedImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-09-29/hgqa2f/1695959601972-2ff5f025-0d87-4b65-84a0-6d5dc34bdd0e/cropped.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMR2RUJADPZ%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035325Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELr%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLXNvdXRoZWFzdC0xIkcwRQIhAO0R94f7SKnxj7zufN2QBwG4mFBKtwdDyLJ0zkFVgV8sAiBl%2FovaH%2BTA7qDJeXdD%2FZtB%2FUDJPerxG5QF5DQp8GfxyyrUBQiz%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMWqgzqvEz%2BVUnex1PKqgFyYBO76y9Ayp9FZ4ImKTpWhCRiKXLg3A%2BR%2F2Pjm68GiXfApUAaA8i%2B%2FzTlZLNB4yt728%2BD8XCoiJcPbP58iPpruHte4iBebq7%2Fv14ssR1TjFGjGGHNA7cPuTLtebGRRom9BHS636T81aKHnpm0f15lO4kLe9nuJVLY53FVU33aTkVvmL2jJTHpmDIklIYNzL8RuGPhAKVsxSokpGHU2RXHnYfO71YluifsL%2BJlAnQbwPFdjXzebZRxhtd7AS%2FRUmWgIdF64bwEcIjwSLB7ELzJFZRaRNG91izNAI03uS0li3YR6MMXeqnl7uQPvhuG62MM5RbJRfQWWfp6VqovFd0jxiauv0WxVXp4fihjxS%2Bz3115Gx4QITbfw8Lm4CxAC90RPhmgyO1m1ZXI%2FJKuHIxURKHFjpWIZONjIIR2YfPPK8Y%2BdFwFIKnC9RXtJENi0L%2BSCL3kK6ZUcJX5yF55IowYKPvx4ZronirajkpYSnfpJ%2BVrg%2BHEw1VXTsTYsj1lAA7ctUGEXq6%2B4IH3WFVocLaDcpB1wp4TzSdyhX4YaLVuJ2XzS7JmdeE%2FmKYuML3TUq4Ez%2Bv4tNrMsBhtAQjicsu7auqptSEmJuKaNBDtqqyiem%2FMLIGyGiV1YysJ2N1oaUyMPTBXapNSAzbHgucPlwBMx%2BeirPY1wvcltX6zsnpOGaBaXxoNPcK%2B7qAVf%2BA8gkZ25MPzY%2BcDmiITpe2GZEYwEw7hL9sc2f1bTGfLD2Kh4xnl%2FWOWLQNYAHZv7MpyATHo8I23EJliq4vFFYKEfAyQui6my3%2BLM2x%2FMGtT5EwjVvQwm06T0NIEd9dyQYv%2B%2FF53pMQYFPPBrLWv%2FKfsgockxFiXpX2vkGl3%2FYVmmLycVSkfv%2F8Uu4%2B6Ka9pB6GycYa13QWwQdGeDwwgObYqAY6sQGceDSbx2PPF0BCy9e3Maft7QqlERMf7lvdkxuCALBoiqQgoRArARFKVASPPooNFcOMo%2FtGHRbvgu9oTTddxpXH8RDS%2BuzQoj%2Faztj4S4mAUpQYcMaEquSeSZRSSUIP0fmq0aYH9tiYuZURRZUC4fAFKuidJoL3PC1cN%2F%2BJK7ig%2Bph3NIoOuW97LWKSMCUlI5r%2B1w1cjjbuDKqMa0BHYHwOFf4rNuXoILip1zgeZ6WLkTc%3D&X-Amz-Signature=b373c2ffe9d718f80ea1926f68f2fdabae150ab7359a3e35d748f2cfa48e7b10&X-Amz-SignedHeaders=host",
                                "fieldsExtracted": {
                                    "age": {
                                        "value": ""
                                    },
                                    "type": {
                                        "value": ""
                                    },
                                    "gender": {
                                        "value": "M"
                                    },
                                    "address": {
                                        "value": "8 WEST MAYA DRIVE PHILAM HOMES QUEZON CITY",
                                        "street": "",
                                        "zipCode": "",
                                        "district": "",
                                        "province": "",
                                        "houseNumber": "",
                                        "additionalInfo": ""
                                    },
                                    "fullName": {
                                        "value": "HURTADO, LESTER BIADORA"
                                    },
                                    "homeTown": {
                                        "value": ""
                                    },
                                    "idNumber": {
                                        "value": "N01-87-049586"
                                    },
                                    "lastName": {
                                        "value": ""
                                    },
                                    "firstName": {
                                        "value": ""
                                    },
                                    "mrzString": {
                                        "value": "",
                                        "gender": "",
                                        "fullName": "",
                                        "idNumber": "",
                                        "dateOfBirth": "",
                                        "nationality": "",
                                        "dateOfExpiry": ""
                                    },
                                    "fatherName": {
                                        "value": ""
                                    },
                                    "middleName": {
                                        "value": ""
                                    },
                                    "motherName": {
                                        "value": ""
                                    },
                                    "spouseName": {
                                        "value": ""
                                    },
                                    "countryCode": {
                                        "value": ""
                                    },
                                    "dateOfBirth": {
                                        "value": "21-04-1970"
                                    },
                                    "dateOfIssue": {
                                        "value": ""
                                    },
                                    "husbandName": {
                                        "value": ""
                                    },
                                    "nationality": {
                                        "value": "PHL"
                                    },
                                    "yearOfBirth": {
                                        "value": "1970"
                                    },
                                    "dateOfExpiry": {
                                        "value": "21-04-2027"
                                    },
                                    "placeOfBirth": {
                                        "value": ""
                                    },
                                    "placeOfIssue": {
                                        "value": ""
                                    }
                                }
                            }
                        ],
                        "summary": {
                            "action": "pass",
                            "details": []
                        }
                    },
                    "status": "success",
                    "metadata": {
                        "requestId": "1695959601972-2ff5f025-0d87-4b65-84a0-6d5dc34bdd0e",
                        "transactionId": $transactionId
                    },
                    "statusCode": 200
                },
                "countrySelected": "phl",
                "croppedImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/readId/2023-09-29/hgqa2f/1695959601972-2ff5f025-0d87-4b65-84a0-6d5dc34bdd0e/cropped.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRQ5EG32MA%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035342Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCmFwLXNvdXRoLTEiSDBGAiEAnxRZWppYtTxAR0lSRBw8O8BsNuJSf%2FixC4lIlHgyCJoCIQCoYZYhZcmmoa6I9QzLjzl9BZ%2FKe1BO%2FHLJ4%2BVgh5bqUyrHBQiy%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMMgagAxRALyfVZI5GKpsFXCrv5p39YJn818JWn%2FQKJpy4%2F%2FMBgXSHx9d2cCEnKOKUIZOo3hl54duCu3Ilobhh0QUm0d%2Fulo3OPx%2FEiYTZXIsMAGzJvtoG4Lk2rWVDZNCeU3qXuTu7%2BIL5O4bLakmul1n9ozz9KQzgoh7qncpWzXzVkEKUDMuHrRUoIP444mNyWLKrMsq%2BI9GQMBoQeMX4QUif4Jz72esYhS8olbsBhSBbDI45MKyM9z20vP6iQa2ppvRfAGNCHmay5zhWedkkVR80kPf8UJOJhypib2VjkOrYSDs%2BqI2Cj222QoSK8dRHhSJTPmaU7u64CWZIthTVbpu8YzvHvQ54F9TUrPbnm9JRDndFfecACsh15tIPKh1X2LO5KJHxgOJaj8G3Aikb%2BXrxXEeHTkgZezbHDOi40FF3DLyvWcmUdyfh26r4EB5A%2Bi9eVyway4QeD%2BQsfnDmTVS9gbndkzuwqMi12iZJaKWwhYek8K7CZxfQ2ERildgwuhxXGaFcbGjqjAXLCCpWwEMt15xXn%2FRTX8rnaNAJj0%2FlOsqv67RxmK8egmvkLvRYVZcoZTU70vKe0auQKjFt75zroVNsCgWC5JJFUDhALs1lQOkS1If1%2BfdFHY1S8fxF1t93GO%2FHi5a9%2B%2F0sWhQh%2BC8icze1z18rjIwr7h4YkgD8aA53cvJOtCLIh3bEHX3FLQWNU5kO1wEncv%2BqUpJk2W0CG16uU8D00%2FZ2lzIzE%2FLxkhCNNfABbrcpO9f%2Bo1M%2FUO8puTPQ3wV79HqVpxgZCIN7yQSdkNDCcJUYjLlyCMZr5KEt%2BFbHOrTvZLoB%2BnIfe4D2lWv7YBzGIFm8NrSgXRr9pt8mQiToWHA0ep411osre3fgiiy3ed5nvOCiZcqcrfuM7J5%2B7FwMLDCiw9ioBjqwAXXOFqDBCHyurI0ZxLp7MbDL3yjoztdqgXBSiQkkPKti%2Be5qhgDppVKvAPWKMBAEAiMOSgHriNcdsgsgw4kr7k1RLFz%2FLagoUKxI8vwNSc%2BbEjpCnK%2BRjyYULg4T%2FCMaR17t3aiq9hqPnkuRLR088RNOzq3JqOzvHFbJN8ZPb%2BWMrY5lKuLw3ubaZYBREKEB5zKjHY5n6gEvNC6xGMHL1xkuyrJRzJwKQaUthJo7ZXRa&X-Amz-Signature=164011b8547feffd9373478d89c6357466dcfc168dea005cd25f4a8c0e5eea38&X-Amz-SignedHeaders=host",
                "documentSelected": "dl",
                "previousAttempts": [],
                "expectedDocumentSide": "front"
            },
            {
                "attempts": "1",
                "imageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/checkLiveness/2023-09-29/hgqa2f/1695959611587-3a7610bd-b2fc-4bba-99e9-6b9df4f7b45c/image.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRQ5EG32MA%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035342Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCmFwLXNvdXRoLTEiSDBGAiEAnxRZWppYtTxAR0lSRBw8O8BsNuJSf%2FixC4lIlHgyCJoCIQCoYZYhZcmmoa6I9QzLjzl9BZ%2FKe1BO%2FHLJ4%2BVgh5bqUyrHBQiy%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMMgagAxRALyfVZI5GKpsFXCrv5p39YJn818JWn%2FQKJpy4%2F%2FMBgXSHx9d2cCEnKOKUIZOo3hl54duCu3Ilobhh0QUm0d%2Fulo3OPx%2FEiYTZXIsMAGzJvtoG4Lk2rWVDZNCeU3qXuTu7%2BIL5O4bLakmul1n9ozz9KQzgoh7qncpWzXzVkEKUDMuHrRUoIP444mNyWLKrMsq%2BI9GQMBoQeMX4QUif4Jz72esYhS8olbsBhSBbDI45MKyM9z20vP6iQa2ppvRfAGNCHmay5zhWedkkVR80kPf8UJOJhypib2VjkOrYSDs%2BqI2Cj222QoSK8dRHhSJTPmaU7u64CWZIthTVbpu8YzvHvQ54F9TUrPbnm9JRDndFfecACsh15tIPKh1X2LO5KJHxgOJaj8G3Aikb%2BXrxXEeHTkgZezbHDOi40FF3DLyvWcmUdyfh26r4EB5A%2Bi9eVyway4QeD%2BQsfnDmTVS9gbndkzuwqMi12iZJaKWwhYek8K7CZxfQ2ERildgwuhxXGaFcbGjqjAXLCCpWwEMt15xXn%2FRTX8rnaNAJj0%2FlOsqv67RxmK8egmvkLvRYVZcoZTU70vKe0auQKjFt75zroVNsCgWC5JJFUDhALs1lQOkS1If1%2BfdFHY1S8fxF1t93GO%2FHi5a9%2B%2F0sWhQh%2BC8icze1z18rjIwr7h4YkgD8aA53cvJOtCLIh3bEHX3FLQWNU5kO1wEncv%2BqUpJk2W0CG16uU8D00%2FZ2lzIzE%2FLxkhCNNfABbrcpO9f%2Bo1M%2FUO8puTPQ3wV79HqVpxgZCIN7yQSdkNDCcJUYjLlyCMZr5KEt%2BFbHOrTvZLoB%2BnIfe4D2lWv7YBzGIFm8NrSgXRr9pt8mQiToWHA0ep411osre3fgiiy3ed5nvOCiZcqcrfuM7J5%2B7FwMLDCiw9ioBjqwAXXOFqDBCHyurI0ZxLp7MbDL3yjoztdqgXBSiQkkPKti%2Be5qhgDppVKvAPWKMBAEAiMOSgHriNcdsgsgw4kr7k1RLFz%2FLagoUKxI8vwNSc%2BbEjpCnK%2BRjyYULg4T%2FCMaR17t3aiq9hqPnkuRLR088RNOzq3JqOzvHFbJN8ZPb%2BWMrY5lKuLw3ubaZYBREKEB5zKjHY5n6gEvNC6xGMHL1xkuyrJRzJwKQaUthJo7ZXRa&X-Amz-Signature=31986fc44ef1b1c872fe255c942afae17a44193e67f37fdbfddd2cc5390405ad&X-Amz-SignedHeaders=host",
                "moduleId": "module_selfie_validation",
                "apiResponse": {
                    "result": {
                        "details": {
                            "liveFace": {
                                "value": "yes",
                                "confidence": "high"
                            }
                        },
                        "summary": {
                            "action": "pass",
                            "details": []
                        }
                    },
                    "status": "success",
                    "metadata": {
                        "requestId": "1695959611587-3a7610bd-b2fc-4bba-99e9-6b9df4f7b45c",
                        "transactionId": $transactionId
                    },
                    "statusCode": 200
                },
                "videoImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/checkLiveness/2023-09-29/hgqa2f/1695959611587-3a7610bd-b2fc-4bba-99e9-6b9df4f7b45c/video.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRQ5EG32MA%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035342Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCmFwLXNvdXRoLTEiSDBGAiEAnxRZWppYtTxAR0lSRBw8O8BsNuJSf%2FixC4lIlHgyCJoCIQCoYZYhZcmmoa6I9QzLjzl9BZ%2FKe1BO%2FHLJ4%2BVgh5bqUyrHBQiy%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMMgagAxRALyfVZI5GKpsFXCrv5p39YJn818JWn%2FQKJpy4%2F%2FMBgXSHx9d2cCEnKOKUIZOo3hl54duCu3Ilobhh0QUm0d%2Fulo3OPx%2FEiYTZXIsMAGzJvtoG4Lk2rWVDZNCeU3qXuTu7%2BIL5O4bLakmul1n9ozz9KQzgoh7qncpWzXzVkEKUDMuHrRUoIP444mNyWLKrMsq%2BI9GQMBoQeMX4QUif4Jz72esYhS8olbsBhSBbDI45MKyM9z20vP6iQa2ppvRfAGNCHmay5zhWedkkVR80kPf8UJOJhypib2VjkOrYSDs%2BqI2Cj222QoSK8dRHhSJTPmaU7u64CWZIthTVbpu8YzvHvQ54F9TUrPbnm9JRDndFfecACsh15tIPKh1X2LO5KJHxgOJaj8G3Aikb%2BXrxXEeHTkgZezbHDOi40FF3DLyvWcmUdyfh26r4EB5A%2Bi9eVyway4QeD%2BQsfnDmTVS9gbndkzuwqMi12iZJaKWwhYek8K7CZxfQ2ERildgwuhxXGaFcbGjqjAXLCCpWwEMt15xXn%2FRTX8rnaNAJj0%2FlOsqv67RxmK8egmvkLvRYVZcoZTU70vKe0auQKjFt75zroVNsCgWC5JJFUDhALs1lQOkS1If1%2BfdFHY1S8fxF1t93GO%2FHi5a9%2B%2F0sWhQh%2BC8icze1z18rjIwr7h4YkgD8aA53cvJOtCLIh3bEHX3FLQWNU5kO1wEncv%2BqUpJk2W0CG16uU8D00%2FZ2lzIzE%2FLxkhCNNfABbrcpO9f%2Bo1M%2FUO8puTPQ3wV79HqVpxgZCIN7yQSdkNDCcJUYjLlyCMZr5KEt%2BFbHOrTvZLoB%2BnIfe4D2lWv7YBzGIFm8NrSgXRr9pt8mQiToWHA0ep411osre3fgiiy3ed5nvOCiZcqcrfuM7J5%2B7FwMLDCiw9ioBjqwAXXOFqDBCHyurI0ZxLp7MbDL3yjoztdqgXBSiQkkPKti%2Be5qhgDppVKvAPWKMBAEAiMOSgHriNcdsgsgw4kr7k1RLFz%2FLagoUKxI8vwNSc%2BbEjpCnK%2BRjyYULg4T%2FCMaR17t3aiq9hqPnkuRLR088RNOzq3JqOzvHFbJN8ZPb%2BWMrY5lKuLw3ubaZYBREKEB5zKjHY5n6gEvNC6xGMHL1xkuyrJRzJwKQaUthJo7ZXRa&X-Amz-Signature=7b700525a536201a3299439d879f3f84a581f254c71fe3496f8defb4524bfa3a&X-Amz-SignedHeaders=host",
                "previousAttempts": []
            },
            {
                "attempts": "1",
                "moduleId": "module_selfie_id_match_api",
                "idImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/matchFace/2023-09-29/hgqa2f/1695959612717-33bd26f6-f145-4550-9160-5e57f75b3ed1/id.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRQ5EG32MA%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035342Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCmFwLXNvdXRoLTEiSDBGAiEAnxRZWppYtTxAR0lSRBw8O8BsNuJSf%2FixC4lIlHgyCJoCIQCoYZYhZcmmoa6I9QzLjzl9BZ%2FKe1BO%2FHLJ4%2BVgh5bqUyrHBQiy%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMMgagAxRALyfVZI5GKpsFXCrv5p39YJn818JWn%2FQKJpy4%2F%2FMBgXSHx9d2cCEnKOKUIZOo3hl54duCu3Ilobhh0QUm0d%2Fulo3OPx%2FEiYTZXIsMAGzJvtoG4Lk2rWVDZNCeU3qXuTu7%2BIL5O4bLakmul1n9ozz9KQzgoh7qncpWzXzVkEKUDMuHrRUoIP444mNyWLKrMsq%2BI9GQMBoQeMX4QUif4Jz72esYhS8olbsBhSBbDI45MKyM9z20vP6iQa2ppvRfAGNCHmay5zhWedkkVR80kPf8UJOJhypib2VjkOrYSDs%2BqI2Cj222QoSK8dRHhSJTPmaU7u64CWZIthTVbpu8YzvHvQ54F9TUrPbnm9JRDndFfecACsh15tIPKh1X2LO5KJHxgOJaj8G3Aikb%2BXrxXEeHTkgZezbHDOi40FF3DLyvWcmUdyfh26r4EB5A%2Bi9eVyway4QeD%2BQsfnDmTVS9gbndkzuwqMi12iZJaKWwhYek8K7CZxfQ2ERildgwuhxXGaFcbGjqjAXLCCpWwEMt15xXn%2FRTX8rnaNAJj0%2FlOsqv67RxmK8egmvkLvRYVZcoZTU70vKe0auQKjFt75zroVNsCgWC5JJFUDhALs1lQOkS1If1%2BfdFHY1S8fxF1t93GO%2FHi5a9%2B%2F0sWhQh%2BC8icze1z18rjIwr7h4YkgD8aA53cvJOtCLIh3bEHX3FLQWNU5kO1wEncv%2BqUpJk2W0CG16uU8D00%2FZ2lzIzE%2FLxkhCNNfABbrcpO9f%2Bo1M%2FUO8puTPQ3wV79HqVpxgZCIN7yQSdkNDCcJUYjLlyCMZr5KEt%2BFbHOrTvZLoB%2BnIfe4D2lWv7YBzGIFm8NrSgXRr9pt8mQiToWHA0ep411osre3fgiiy3ed5nvOCiZcqcrfuM7J5%2B7FwMLDCiw9ioBjqwAXXOFqDBCHyurI0ZxLp7MbDL3yjoztdqgXBSiQkkPKti%2Be5qhgDppVKvAPWKMBAEAiMOSgHriNcdsgsgw4kr7k1RLFz%2FLagoUKxI8vwNSc%2BbEjpCnK%2BRjyYULg4T%2FCMaR17t3aiq9hqPnkuRLR088RNOzq3JqOzvHFbJN8ZPb%2BWMrY5lKuLw3ubaZYBREKEB5zKjHY5n6gEvNC6xGMHL1xkuyrJRzJwKQaUthJo7ZXRa&X-Amz-Signature=a6ab3f8a0baa35306062d70ea29b0c7f0b9cf742b500b876c31e09df16681d5b&X-Amz-SignedHeaders=host",
                "apiResponse": {
                    "result": {
                        "details": {
                            "match": {
                                "value": "yes",
                                "confidence": "high"
                            }
                        },
                        "summary": {
                            "action": "pass",
                            "details": []
                        }
                    },
                    "status": "success",
                    "metadata": {
                        "requestId": "1695959612717-33bd26f6-f145-4550-9160-5e57f75b3ed1",
                        "transactionId": $transactionId
                    },
                    "statusCode": 200
                },
                "selfieImageUrl": "https://prod-audit-portal-sgp.s3.ap-southeast-1.amazonaws.com/gkyc-ap-southeast-1/matchFace/2023-09-29/hgqa2f/1695959612717-33bd26f6-f145-4550-9160-5e57f75b3ed1/selfie.jpeg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAZRKK5ZMRQ5EG32MA%2F20230929%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20230929T035342Z&X-Amz-Expires=900&X-Amz-Security-Token=IQoJb3JpZ2luX2VjELn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCmFwLXNvdXRoLTEiSDBGAiEAnxRZWppYtTxAR0lSRBw8O8BsNuJSf%2FixC4lIlHgyCJoCIQCoYZYhZcmmoa6I9QzLjzl9BZ%2FKe1BO%2FHLJ4%2BVgh5bqUyrHBQiy%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAEaDDY1NTY3NjUyNTM0NyIMMgagAxRALyfVZI5GKpsFXCrv5p39YJn818JWn%2FQKJpy4%2F%2FMBgXSHx9d2cCEnKOKUIZOo3hl54duCu3Ilobhh0QUm0d%2Fulo3OPx%2FEiYTZXIsMAGzJvtoG4Lk2rWVDZNCeU3qXuTu7%2BIL5O4bLakmul1n9ozz9KQzgoh7qncpWzXzVkEKUDMuHrRUoIP444mNyWLKrMsq%2BI9GQMBoQeMX4QUif4Jz72esYhS8olbsBhSBbDI45MKyM9z20vP6iQa2ppvRfAGNCHmay5zhWedkkVR80kPf8UJOJhypib2VjkOrYSDs%2BqI2Cj222QoSK8dRHhSJTPmaU7u64CWZIthTVbpu8YzvHvQ54F9TUrPbnm9JRDndFfecACsh15tIPKh1X2LO5KJHxgOJaj8G3Aikb%2BXrxXEeHTkgZezbHDOi40FF3DLyvWcmUdyfh26r4EB5A%2Bi9eVyway4QeD%2BQsfnDmTVS9gbndkzuwqMi12iZJaKWwhYek8K7CZxfQ2ERildgwuhxXGaFcbGjqjAXLCCpWwEMt15xXn%2FRTX8rnaNAJj0%2FlOsqv67RxmK8egmvkLvRYVZcoZTU70vKe0auQKjFt75zroVNsCgWC5JJFUDhALs1lQOkS1If1%2BfdFHY1S8fxF1t93GO%2FHi5a9%2B%2F0sWhQh%2BC8icze1z18rjIwr7h4YkgD8aA53cvJOtCLIh3bEHX3FLQWNU5kO1wEncv%2BqUpJk2W0CG16uU8D00%2FZ2lzIzE%2FLxkhCNNfABbrcpO9f%2Bo1M%2FUO8puTPQ3wV79HqVpxgZCIN7yQSdkNDCcJUYjLlyCMZr5KEt%2BFbHOrTvZLoB%2BnIfe4D2lWv7YBzGIFm8NrSgXRr9pt8mQiToWHA0ep411osre3fgiiy3ed5nvOCiZcqcrfuM7J5%2B7FwMLDCiw9ioBjqwAXXOFqDBCHyurI0ZxLp7MbDL3yjoztdqgXBSiQkkPKti%2Be5qhgDppVKvAPWKMBAEAiMOSgHriNcdsgsgw4kr7k1RLFz%2FLagoUKxI8vwNSc%2BbEjpCnK%2BRjyYULg4T%2FCMaR17t3aiq9hqPnkuRLR088RNOzq3JqOzvHFbJN8ZPb%2BWMrY5lKuLw3ubaZYBREKEB5zKjHY5n6gEvNC6xGMHL1xkuyrJRzJwKQaUthJo7ZXRa&X-Amz-Signature=bb7965f36629c2f8d92aad95e081e3596c75e65cf8cba1d779e7fb6812c055db&X-Amz-SignedHeaders=host",
                "previousAttempts": []
            }
        ],
        "workflowDetails": {
            "version": 1,
            "workflowId": "workflow_CyjvX9z"
        },
        "applicationStatus": "auto_approved"
    },
    "status": "success",
    "metadata": {
        "requestId": "1695959621225-8a698905-f9ec-4385-9064-babb17500758",
        "transactionId": $transactionId
    },
    "statusCode": 200
}
EOT;

    }
}

if (!function_exists('mockResponseJsonGenerateUrl')) {
    function mockResponseJsonGenerateUrl(string $url): string
    {
        return <<<EOT
{
    "status": "success",
    "statusCode": 200,
    "metadata": {
        "requestId": "1677292617660-8e117723-1dac-4509-9880-698e2514de17"
    },
    "result": {
        "startKycUrl": "$url"
    }
}
EOT;
    }
}

if (!function_exists('mockPaynamicsPaybizPayload')) {
    function mockPaynamicsPaybizPayload(mixed $amount = 100): string
    {
        return <<<EOF
{"pchannel": "gc", "signature": "a4273f950377be849db234787c2e7a6db4357d710ec5b1f5882d0d8a53718988ee1fa8e12ca06e27ef229c2d896b8993ac1a6808c307a8f72aa8927caef2ed72", "timestamp": "2023-07-18T17:10:05.000+08:00", "request_id": "FTFV0C85DXC8EBHXAW", "merchant_id": "00000027011198B17BFB", "response_id": "10749334647826582", "customer_info": {"zip": "NA", "city": "NA", "name": "Lester  Hurtado", "email": "lbhurtado@gmail.com", "amount": "$amount", "mobile": "639178251991", "address": "E1504 PSE Centre, Exchange Road, Ortigas Center", "province": "NA"}, "pay_reference": "196477618", "response_code": "GR001", "response_advise": "Transaction is approved", "response_message": "Transaction Successful", "processor_response_id": "196477618"}
EOF;
    }
}

if (!function_exists('mockThinLayerCheckoutPayload')) {
    function mockThinLayerCheckoutPayload(string $generatedOptionKey)
    {
        $key = LBHurtado\Barker\Classes\ThinLayer::$secretKey;
        $input = [
            'data' => [
                'customer' => [
                    'first_name' => 'Abel',
                    'last_name' => 'Maclead',
                    'billing_address' => [
                        'line1' => '8 West Maya Drive',
                        'line2' => 'Philam Homes',
                        'city_municipality' => 'Quezon City',
                        'zip' => '1104',
                        'state_province_region' => 'NCR',
                        'country_code' => 'PH'
                    ],
                    'shipping_address' => [
                        'line1' => '8 West Maya Drive',
                        'line2' => 'Philam Homes',
                        'city_municipality' => 'Quezon City',
                        'zip' => '1104',
                        'state_province_region' => 'NCR',
                        'country_code' => 'PH'
                    ],
                    'contact' => [
                        'email' => 'lbhurtado@gmail.com',
                        'mobile' => '+639173011987'
                    ],
                ],
                'payment' => [
                    'description' => 'KwYC Check',
                    'amount' => '20',
                    'currency' => 'PHP',
                    'option' => "$generatedOptionKey",
                    'merchant_reference_id' => (string) Illuminate\Support\Str::uuid(),
                    'other_references' => [
                        (string) Illuminate\Support\Str::uuid(),
                        (string) Illuminate\Support\Str::uuid()
                    ]
                ],
                'route' => [
                    'callback_url' => 'https://tlpe.io/thankyou',
                    'notify_user' => false
                ],
                'time_offset' => '+08:00',
                'customer_ip_address' => '192.168.1.1'
            ]
        ];
        $validated = $input;

        $payload = Firebase\JWT\JWT::encode($validated, $key, 'HS256');

        return $payload;
    }
}
