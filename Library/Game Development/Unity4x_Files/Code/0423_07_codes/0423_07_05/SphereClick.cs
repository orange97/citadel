// file: SphereClick.cs
using UnityEngine;
using System.Collections;

public class SphereClick : MonoBehaviour
{
	private void OnGUI(){
		GUILayout.Label( "Score: " + PlayerPrefs.GetInt("score") );
	}
	
	private void OnMouseDown() {
		if( gameObject.CompareTag("blue") ){
			int newScore = 50 + PlayerPrefs.GetInt("score");
			PlayerPrefs.SetInt("score", newScore);
		}

		Destroy(gameObject);
		GotoNextLevel();
	}
	
	private void GotoNextLevel() {
		int level = Application.loadedLevel + 1;
        Application.LoadLevel(level);
    }
}