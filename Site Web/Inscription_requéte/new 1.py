Try :
    mFind = find(Pattern(« img »)) #pas de .match ,car find est déjà un objet de type   match par défaut
	if mFind :
		mFind.click() 
Except :
	return False
