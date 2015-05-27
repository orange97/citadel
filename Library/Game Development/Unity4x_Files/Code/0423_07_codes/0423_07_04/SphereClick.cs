// file: SphereClick.cs
using UnityEngine;
using System.Collections;

public class SphereClick : MonoBehaviour
{
	private void OnGUI(){
		GUILayout.Label( "Score: " + Player.score );
	}
	
	private void OnMouseDown() {
		if( gameObject.CompareTag("blue") )
			Player.score += 50;

        Destroy(gameObject);
		GotoNextLevel();
	}
	
	private void GotoNextLevel() {
		int level = Application.loadedLevel + 1;
        Application.LoadLevel(level);
    }
}