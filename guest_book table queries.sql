CREATE TABLE guest_book (
    guest_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    job_title VARCHAR(100),
    company VARCHAR(200),
    linkedIn VARCHAR (100),
    email VARCHAR (100),
    met_by VARCHAR (100) NOT NULL,
    mail_list_method VARCHAR(4),
    date_signed DATETIME NOT NULL DEFAULT NOW()
)

INSERT INTO guest_book(`fname`, `lname`, `job_title`,
        `company`, `linkedIn`, `email`, `met_by`, `mail_list_method`) VALUES
    ('Joseph', 'Igama', 'Student', 'Green River College', 'https://www.linkedin.com/in/josephallenigama/','heyits@joseph.com', 'Job Fair', 'HTML');