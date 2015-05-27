// file: MenuStart.cs
using UnityEngine;
using System.Collections;

public class MenuStart : MonoBehaviour
{
	const string DEFAULT_PLAYER_NAME = "PLAYER_NAME";
	private string playerNameField = DEFAULT_PLAYER_NAME;

	private void OnGUI() {
		string rules = "Easiest Game Ever -- Click the blue spheres to advance.";
		GUILayout.Label(rules);

		if(PlayerPrefs.HasKey("username"))
			WelcomeGUI();
		else
			CreatePlayerGUI();
	}
	
	private void WelcomeGUI() {
		string welcomeMessage = "Welcome, " + PlayerPrefs.GetString("username") + ". You currently have " + PlayerPrefs.GetInt("score") + " points.";
        GUILayout.Label(welcomeMessage);
		
		bool playButtonClicked = GUILayout.Button("Play");
		bool eraseButtonClicked = GUILayout.Button("Erase Data");
		
		if( playButtonClicked )
			Application.LoadLevel(1);
		
		if( eraseButtonClicked )
			ResetGameData();
	}
	
	private void ResetGameData() {
		PlayerPrefs.DeleteAll();
		playerNameField = DEFAULT_PLAYER_NAME;
	}

	private void CreatePlayerGUI() {
	    string createMessage = "Please, insert your username below and click on Create User";
		GUILayout.Label(createMessage);
	
	    playerNameField = GUILayout.TextField(playerNameField, 25);
	
	    bool createUserButtonClicked= GUILayout.Button("Create User");
		
		if( createUserButtonClicked ){
			PlayerPrefs.SetString("username", playerNameField);
			PlayerPrefs.SetInt("score", 0);
		}
	}
}