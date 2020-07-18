<?php

    /**
     * DatabaseHandler.php
     *
     * This class is used for creating a DatabaseHandler-object, which is used
     * to communicate (SELECT statements only) with the database.
     *
     * @package     Homepage
     * @author      Mats Richard Hellstrand
     * @copyright   Copyright (c) 2015-2025, Mats Richard Hellstrand
     * @license     TODO: http://
     * @link        TODO: http://
     * @since       July 18th, 2020 - Version 1.4
     */
    // ===========================================================================

    class DatabaseHandler {
        private $user           = NULL;
        private $connection     = NULL;
        private $tuples         = NULL;
        private $success        = 0;
        private $married        = 2005;

        /**
         * The default constructor of the DatabaseHandler-object.
         *
         * @access      public
         * @param       string      $host           the MySQL host
         * @param       string      $account        the MySQL account
         * @param       string      $password       the MySQL password
         * @param       string      $dbname         the MySQL database name
         */
        public function __construct($host, $account, $password, $dbname) {
            $this->user = [$host, $account, $password, $dbname];
        }

        // ===========================================================================

        /**
         * Database management - loadingSession
         *
         * This function is used for SELECT sessions with the MySQL database.
         *
         * @access      public
         * @param       array       $values         the array holds all the data required for making a SELECT query
         * @return      bool                        the result of the loading session
         */
        public function loadingSession($values) {
            return $this->loadFromDatabase($values);
        }

        /**
         * Database management - loadFromDatabase
         *
         * This function is used for actually loading data from the database.
         *
         * @access      private
         * @param       array       $values         the array holds all the data required for making a SELECT query
         * @return      bool                        the result of the loading session
         */
        private function loadFromDatabase($values) {
            // Establish a connection with the database.
            $this->connection = new mysqli($this->user[0], $this->user[1], $this->user[2], $this->user[3]);

            // If an error occurs, a description of the error will be returned.
            if ($this->connection->connect_errno) {
                $_SESSION['SQL_CONNECT_ERROR'] = $this->connection->connect_errno;
            }

            if (empty($_SESSION['SQL_CONNECT_ERROR'])) {
                // Construct the SQL-statement.
                $query = $this->constructStatement($values);
                $this->connection->set_charset('utf8');
                $this->success = -1;

                // echo '['.$query.']';
                // Run the SQL query and return the results to the variable with the same name.
                $result = $this->connection->query($query, MYSQLI_USE_RESULT);
                if (!empty($result)) {
                    // Fetch every row according to the specification of the query.
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        if (isset($row['hidden']) && $row['hidden'] === '0') { // Hide rows that are seen as hidden.
                            if ($values['table'][0] === 'alpha_information') {
                                // Get the paragraphs data under the About page.
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['title'];
                                $this->tuples[2]    = str_replace('#YEAR#', (date('Y') - $married), $row['paragraph']);
                                $this->tuples[3]    = $row['page'];
                                $this->tuples[4]    = $row['group'];
                                $_SESSION['process']->addAlpha_Information($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_project') {
                                // Get the project data under the Portfolio page.
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['name'];
                                $this->tuples[2]    = $row['customer'];
                                $this->tuples[3]    = $row['position'];
                                $this->tuples[4]    = $row['beginning'];
                                $this->tuples[5]    = $row['ending'];
                                $this->tuples[6]    = $row['website'];
                                $this->tuples[7]    = $row['keyword'];
                                $this->tuples[8]    = $row['description'];
                                $this->tuples[9]    = $row['directory'];
                                $_SESSION['process']->addAlpha_Project($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_education') {
                                // Get the education data under the Qualification page (Education : Course overview).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['institution'];
                                $this->tuples[2]    = $row['level'];
                                $this->tuples[3]    = $row['major'];
                                $this->tuples[4]    = $row['name'];
                                $this->tuples[5]    = $row['points'];
                                $this->tuples[6]    = $row['location'];
                                $this->tuples[7]    = $row['graduation'];
                                $this->tuples[8]    = $row['website'];
                                $this->tuples[9]    = $row['description'];
                                $this->tuples[10]   = $row['keyword'];
                                $_SESSION['process']->addAlpha_Education($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_degree') {
                                // Get the education data under the Qualification page (Education : Degree overview).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['institution'];
                                $this->tuples[2]    = $row['level'];
                                $this->tuples[3]    = $row['major'];
                                $this->tuples[4]    = $row['name'];
                                $this->tuples[5]    = $row['points'];
                                $this->tuples[6]    = $row['location'];
                                $this->tuples[7]    = $row['graduation'];
                                $this->tuples[8]    = $row['website'];
                                $this->tuples[9]    = $row['description'];
                                $this->tuples[10]   = $row['keyword'];
                                $_SESSION['process']->addAlpha_Degree($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_career') {
                                // Get the career data under the Qualification page (Career).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['company'];
                                $this->tuples[2]    = $row['position'];
                                $this->tuples[3]    = $row['employment'];
                                $this->tuples[4]    = $row['beginning'];
                                $this->tuples[5]    = $row['ending'];
                                $this->tuples[6]    = $row['website'];
                                $this->tuples[7]    = $row['description'];
                                $this->tuples[8]    = $row['keyword'];
                                $_SESSION['process']->addAlpha_Career($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_result') {
                                // Get the result data under the Qualification page (Result).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['agent'];
                                $this->tuples[2]    = $row['name'];
                                $this->tuples[3]    = $row['beginning'];
                                $this->tuples[4]    = $row['ending'];
                                $this->tuples[5]    = $row['score'];
                                $this->tuples[6]    = $row['website'];
                                $this->tuples[7]    = $row['description'];
                                $_SESSION['process']->addAlpha_Result($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_experience') {
                                // Get the experience data under the Qualification page (Experience).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['value'];
                                $this->tuples[2]    = $row['category'];
                                $this->tuples[3]    = $row['grading'];
                                $_SESSION['process']->addAlpha_Experience($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_certification') {
                                // Get the result data under the Certification page (Certification).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['category'];
                                $this->tuples[2]    = $row['name'];
                                $this->tuples[3]    = $row['nominated'];
                                $this->tuples[4]    = $row['publisher'];
                                $this->tuples[5]    = $row['website'];
                                $this->tuples[6]    = $row['description'];
                                $this->tuples[7]    = $row['directory'];
                                $_SESSION['process']->addAlpha_Certification($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_award') {
                                // Get the award data under the Qualification page (Award).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['publisher'];
                                $this->tuples[2]    = $row['name'];
                                $this->tuples[3]    = $row['nominated'];
                                $this->tuples[4]    = $row['score'];
                                $this->tuples[5]    = $row['website'];
                                $this->tuples[6]    = $row['description'];
                                $this->tuples[7]    = $row['directory'];
                                $_SESSION['process']->addAlpha_Award($this->tuples);
                                $this->success = 0;
                            } else if ($values['table'][0] === 'alpha_testimonial') {
                                // Get the testimonial data under the Qualification page (Testimonial).
                                $this->success      = -1;
                                $this->tuples       = [];
                                $this->tuples[0]    = $row['id'];
                                $this->tuples[1]    = $row['author'];
                                $this->tuples[2]    = $row['company'];
                                $this->tuples[3]    = $row['website'];
                                $this->tuples[4]    = $row['authored'];
                                $this->tuples[5]    = $row['description'];
                                $this->tuples[6]    = $row['short'];
                                $_SESSION['process']->addAlpha_Testimonial($this->tuples);
                                $this->success = 0;
                            }
                        }
                    }

                    // Free the memory used for the last SQL query.
                    $result->free();
                } else {
                    // If an error occurs, a description of the error will be returned.
                    if ($mysqli->connect_errno) {
                        $_SESSION['SQL_ERROR'][] = $this->connection->connect_errno;
                    }
                }

                $this->connection->close();
            }

            if ($this->success === 0) { // Data was found under the database and processed.
                return true;
            } else { // Data was NOT found, OR some issue happend, under the database.
                return false;
            }
        }

        /**
         * Database management - constructStatement
         *
         * This function is used for building a valid SELECT, SQL statement, although it currently has
         * limitations regarding adding sorting to the statement.
         *
         * @access      private
         * @param       array       $values         the array holds all the data required for making a SELECT query
         * @return      string                      the result of the loading session
         */
        private function constructStatement($values) {
            $query = 'SELECT ';

            if (empty($values['column'])) { // If there are no columns, request ALL.
                $query .= '*';
            } else { // Otherwise, request specific ones.
                $size = count($values['column']);
                for ($i = 0; $i < $size; $i++) {
                    $query .= $values['column'][$i];

                    // Only on the last coloumn should this be ignored.
                    if ($i !== ($size - 1)) {
                        $query .= ', ';
                    }
                }
            }

            $query .= ' FROM ' . $values['table'][0];

            if (!empty($values['condition'])) { // If there are conditions, add them to the statement.
                $query .= ' WHERE ';

                $size = count($values['condition']);
                if ($size > 1) {
                    for ($i = 0; $i < $size; $i+=2) {
                        $query .= $values['condition'][$i] . "='" . $values['condition'][$i+1] . "'";

                        // Only on the last coloumn should this be ignored.
                        if ($i < $size - 2) {
                            $query .= ' AND ';
                        }
                    }
                } else {
                    $query .= $values['condition'][0];
                }
            }

            if (!empty($values['order'])) { // If there are sorting, add them to the statement.
                $query .= ' ORDER BY ';

                $size = count($values['order']);
                for ($i = 0; $i < $size; $i++) {
                    $query .= $values['order'][$i];
                    $query .= ' ' . $values['sort'][$i];

                    // Only on the last coloumn should this be ignored.
                    if ($i !== ($size - 1)) {
                        $query .= ', ';
                    }
                }
            }

            return $query;
        }
    }

?>
