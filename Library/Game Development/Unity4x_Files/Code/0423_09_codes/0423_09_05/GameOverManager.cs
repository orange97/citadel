// file: GameOverManager.cs
using UnityEngine;
using System.Collections;

public class GameOverManager : MonoBehaviour {
	private bool gameWon = false;
	
	void Update() {
		GameObject[] wallObjects = GameObject.FindGameObjectsWithTag("brick");
		int numWallObjects = wallObjects.Length;
		
		if( numWallObjects < 1 )
			gameWon = true;
	}
	
	void OnGUI() {
		if( gameWon )
			GUILayout.Label("Well Done - you have destroyed the whole wall!");
	}
}