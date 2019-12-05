namespace Phalcon\Init\Tutorial\Controllers\Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;

class UserValidation extends Validation()
{
    $this->add(
        'username',
        new PresenceOf(
            [
                'message' => 'The username is required',
            ]
        )
    )
    $this->add(
        'password',
        new PresenceOf(
            [
                'message' => 'The password is required',
            ]
        )
    )

    $this->add(
        'password',
        new Regex(
            [
                'pattern' => '/[^_\n\r\s]{8,}',
                'message' => 'Password must contain at least 8 characters',
            ]
        )
    )