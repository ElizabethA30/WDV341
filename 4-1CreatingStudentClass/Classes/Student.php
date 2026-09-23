<?php

    class Student {
        private $firstName;
        private $lastName;
        private $email;
        private $program;

        public function __construct($firstName, $lastName, $email, $program)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->program = $program;
        }

        public function displayStudent(){
            return "
            <ul>
                <li>" . $this->firstName . "</li>
                <li>" . $this->lastName . "</li>
                <li>" . $this->email . "</li>
                <li>" . $this->program . "</li>
            </ul>";
        }
    }

?>