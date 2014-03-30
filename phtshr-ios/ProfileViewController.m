//
//  ProfileViewController.m
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import "ProfileViewController.h"
#import "AppUser.h"
#import "MyPhoto.h"

@interface ProfileViewController ()

@end

@implementation ProfileViewController

AppUser *user;

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    // Do any additional setup after loading the view.
    user = [AppUser new];
    user.lastName = @"Lizard";
    user.firstName = @"Hehehe";
    user.email = @"hehehe.lizard@gmail.com";
    
    MyPhoto *photo1 = [[MyPhoto alloc] initWithId: 1 source:@"https://dl.dropboxusercontent.com/u/2308099/photoz/qAe2XKh.jpg" description:@"description example"];
    [user.lstMyPictures addObject:photo1];
    
    self.username.text = [NSString stringWithFormat:@"%@ %@", user.firstName, user.lastName];
    self.email.text = user.email;
    self.profilePicture.image = photo1;
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

/*
#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender
{
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
}
*/

@end
