// file: DisableWhenInvisible
using UnityEngine;
using System.Collections;

public class DisableWhenInvisible : MonoBehaviour {
	public Transform player;

    void OnBecameVisible() {
        enabled = true;
		print ("cube became visible again");
	}
	
    void OnBecameInvisible() {
        enabled = false;
		print ("cube became in-visible");
	}
	
	private void OnGUI() {
		float d = Vector3.Distance( transform.position, player.position);
		GUILayout.Label ("distance from player to cube = " + d);
	}
}
	