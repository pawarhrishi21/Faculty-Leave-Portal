CREATE OR REPLACE FUNCTION deductLeaves()

	RETURNS TRIGGER 
	AS $$
	
	#variable_conflict use_column
	DECLARE leaves_left INTEGER;
	
	BEGIN
	
	SELECT leaves 
	INTO leaves_left 
	FROM leaves 
	WHERE userid=NEW.applicantid;
	
	UPDATE leaves 
	SET leaves=(leaves_left-1) 
	WHERE userid=NEW.applicantid;
	
	RETURN NEW;

	END;
	$$ LANGUAGE plpgsql;


CREATE TRIGGER deductLeaves
	AFTER UPDATE ON applications
	FOR EACH ROW
	WHEN (NEW.status ='Approved' AND NEW.status != OLD.status)
	EXECUTE PROCEDURE deductLeaves();