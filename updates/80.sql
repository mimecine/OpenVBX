ALTER TABLE groups ADD timeout VARCHAR(3) DEFAULT '' NOT NULL;
UPDATE `groups` SET `timeout` = '';
UPDATE `settings` SET `value` = 80 WHERE `name` = 'schema-version';