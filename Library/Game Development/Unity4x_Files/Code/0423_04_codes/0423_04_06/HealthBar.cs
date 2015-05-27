// file: HealthBar.cs
using UnityEngine;
using System.Collections;

public class HealthBar : MonoBehaviour 
{
	const int MAX_HEALTH = 100;
	public Texture2D bar00;
	public Texture2D bar10;
	public Texture2D bar20;
	public Texture2D bar30;
	public Texture2D bar40;
	public Texture2D bar50;
	public Texture2D bar60;
	public Texture2D bar70;
	public Texture2D bar80;
	public Texture2D bar90;
	public Texture2D bar100;
	
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
		if( health > 0.9 ){	return bar100;	}
		else if( health > 0.8 ){	return bar90;	}
		else if( health > 0.7 ){	return bar80;	}
		else if( health > 0.6 ){	return bar70;	}
		else if( health > 0.5 ){	return bar60;	}
		else if( health > 0.4 ){	return bar50;	}
		else if( health > 0.3 ){	return bar40;	}
		else if( health > 0.2 ){	return bar30;	}
		else if( health > 0.1 ){	return bar20;	}
		else if( health > 0 ){	return bar10;	}
		else{	return bar00;	}
	}


}