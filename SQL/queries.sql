-- INSERT – Add a New Student
INSERT INTO Student (name, email, department)
VALUES ('Muhmedsadiq', 'muhmedsadiq@gmail.com', 'Network Engineering');

-- Select all records from Student table
SELECT * FROM Student;

-- Insert a new club into Club table
INSERT INTO Club (club_name, description)
VALUES ('COIE Students', 'This club is created for the students of College of Information Engineering to give the students the opportunity to participate in some IT activities');

-- Select all records from club table
SELECT * FROM club;

-- Insert a new session into session table
INSERT INTO session (club_id, session_title, session_date)
VALUES (1, 'Introduction to NOC', '2025-05-01');

-- Update session location for club_id 1
UPDATE session SET location = '206 New Building'
WHERE club_id = 1;

-- Select all records from session table
SELECT * FROM session;

-- Delete a registration with registration_id 5
DELETE FROM Registration
WHERE registration_id = 5;

-- Join multiple tables to show student registrations
SELECT s.name AS student_name, se.session_title, se.session_date, c.club_name
FROM Registration r
JOIN Student s ON r.student_id = s.student_id
JOIN Session se ON r.session_id = se.session_id
JOIN Club c ON se.club_id = c.club_id;

-- Count registrations for different sessions using UNION
SELECT COUNT(*) FROM Registration WHERE session_id = 1
UNION
SELECT COUNT(*) FROM Registration WHERE session_id = 2;
