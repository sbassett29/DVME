--
-- Table(s) for the DVME extension
--

-- Notes table
CREATE TABLE /*_*/dvme_table (
  -- Unique ID to identify each note
  dvme_id int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,

  -- Note value as a string.
  dvme_value blob

) /*$wgDBTableOptions*/;
