// file: PlayerInventory
using UnityEngine;
using System.Collections;

public class PlayerInventory : MonoBehaviour 
{
	private bool isCarryingKey = false;
	
	private void OnGUI()
	{
		string keyMessage = "(bag is empty)";
		if( isCarryingKey )
		{
			keyMessage = "carrying: [ key ]";	
		}
		
		GUILayout.Label ( keyMessage );
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
