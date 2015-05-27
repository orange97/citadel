// file: HealthBarPublicArray.cs
using UnityEngine;
using System.Collections;

public class HealthBarPublicArray : MonoBehaviour 
{
	const int MAX_HEALTH = 100;
	public Texture2D[] barImageArray;
	
	private int healthPoints = MAX_HEALTH;
	
	private void OnGUI() 
	{
    	GUILayout.Label("health = " + healthPoints);
		float normalisedHealth = (float)healthPoints / MAX_HEALTH;
    	GUILayout.Label( HealthBarImage(normalisedHealth) );
    	
    	bool decButtonClicked = GUILayout.Button("decrease power");
    	bool incButtonClicked = GUILayout.Button("increase power");

		if( decButtonClicked )
			healthPoints -= 5;
    	
    	if( incButtonClicked )
			healthPoints += 5;
    }
    
	private Texture2D HealthBarImage(float health)
	{
		if( health > 0.9 ){	return barImageArray[10];	}
		else if( health > 0.8 ){	return barImageArray[9];	}
		else if( health > 0.7 ){	return barImageArray[8];	}
		else if( health > 0.6 ){	return barImageArray[7];	}
		else if( health > 0.5 ){	return barImageArray[6];	}
		else if( health > 0.4 ){	return barImageArray[5];	}
		else if( health > 0.3 ){	return barImageArray[4];	}
		else if( health > 0.2 ){	return barImageArray[3];	}
		else if( health > 0.1 ){	return barImageArray[2];	}
		else if( health > 0 ){	return barImageArray[1];	}
		else{	return barImageArray[0];	}
	}


}