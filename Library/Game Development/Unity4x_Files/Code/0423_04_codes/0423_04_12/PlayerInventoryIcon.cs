// file: PlayerInventoryIcon.cs
using UnityEngine;
using System.Collections;

public class PlayerInventoryIcon : MonoBehaviour 
{
	public Texture keyIcon;
	public Texture emptyIcon;
	
	private bool isCarryingKey = false;
	
	private void OnGUI()
	{
		if( isCarryingKey )
			GUILayout.Label( keyIcon );
		else
			GUILayout.Label( emptyIcon );
	}
	
	private void OnTriggerEnter(Collider hitCollider)
	{
		if( "key" == hitCollider.tag )
		{
			isCarryingKey = true;
			Destroy ( hitCollider.gameObject );
		}
	}
}
